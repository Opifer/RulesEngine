<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class NotContainsTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new NotContains();
        $this->assertTrue($operator->evaluate('somestring', 'someotherstring'));
        $this->assertTrue($operator->evaluate([1,2,3], 6));
        $this->assertFalse($operator->evaluate('somestring', 'string'));
        $this->assertFalse($operator->evaluate([1,2,3], 2));
    }

    public function testSerializeString()
    {
        $condition = new Condition();
        $condition->setLeft('somestring');
        $condition->setOperator(new NotContains());
        $condition->setRight('someotherstring');

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
        $condition->setOperator(new NotContains());
        $condition->setRight(2);

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
