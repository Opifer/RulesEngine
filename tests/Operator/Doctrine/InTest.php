<?php

namespace Opifer\RulesEngine\Operator\Doctrine;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\Context\DoctrineContext;
use Opifer\RulesEngine\RulesEngine;

class InTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $condition = new Condition();
        $condition->setLeft('a.name');
        $condition->setOperator(new In());
        $condition->setRight([1, 2, 3]);

        $set = new ConditionSet();
        $set->addCondition($condition);

        $qb = \Mockery::mock('Doctrine\ORM\QueryBuilder');
        $qb->shouldReceive('andWhere')->with(\Mockery::on(function (&$data) {
            if ($data == 'a.name IN (:param1)') {
                return true;
            }

            return false;
        }));
        $qb->shouldReceive('setParameter')->with('param1', [1, 2, 3]);
        $context = new DoctrineContext($qb);

        $rulesEngine = new RulesEngine();
        $rulesEngine->interpret($set, $context);
    }

    public function testSerializeString()
    {
        $condition = new Condition();
        $condition->setLeft('a.name');
        $condition->setOperator(new In());
        $condition->setRight([1, 2, 3]);

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
