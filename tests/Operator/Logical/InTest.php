<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class InTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new In();
        $this->assertTrue($operator->evaluate('string', 'somelongstring'));
        $this->assertTrue($operator->evaluate(2, [1,2,3]));
        $this->assertTrue($operator->evaluate([2,3], [1,2,3]));
        $this->assertFalse($operator->evaluate([4,5], [1,2,3]));
        $this->assertFalse($operator->evaluate('somelongstring', 'string'));
        $this->assertFalse($operator->evaluate(4, [1,2,3]));
        $this->assertFalse($operator->evaluate([4,5], 4));
    }

    public function testSerialize()
    {
        $condition = new Condition();
        $condition->setLeft('string');
        $condition->setOperator(new In());
        $condition->setRight('somelongstring');

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
