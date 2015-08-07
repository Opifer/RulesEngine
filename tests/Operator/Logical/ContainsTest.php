<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class ContainsTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new Contains();
        $this->assertTrue($operator->evaluate('somelongstring', 'long'));
        $this->assertTrue($operator->evaluate([1,2,3], 2));
        $this->assertFalse($operator->evaluate('somelongstring', 'someotherlongstring'));
        $this->assertFalse($operator->evaluate([1,2,3], 4));
    }

    public function testSerializeString()
    {
        $condition = new Condition();
        $condition->setLeft('somelongstring');
        $condition->setOperator(new Contains());
        $condition->setRight('long');

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }

    public function testSerializeArray()
    {
        $condition = new Condition();
        $condition->setLeft([1,2,3]);
        $condition->setOperator(new Contains());
        $condition->setRight(2);

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
