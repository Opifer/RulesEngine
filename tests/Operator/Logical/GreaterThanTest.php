<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class GreaterThanTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new GreaterThan();
        $this->assertFalse($operator->evaluate(123, 123));
        $this->assertTrue($operator->evaluate(1234, 123));
        $this->assertFalse($operator->evaluate(1234, 12345));
    }

    public function testSerialize()
    {
        $condition = new Condition();
        $condition->setLeft('somelongstring');
        $condition->setOperator(new GreaterThan());
        $condition->setRight('long');

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
