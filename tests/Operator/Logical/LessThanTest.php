<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class LessThanTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new LessThan();
        $this->assertFalse($operator->evaluate(123, 123));
        $this->assertTrue($operator->evaluate(123, 1234567));
        $this->assertFalse($operator->evaluate(123456789, 123));
    }

    public function testSerialize()
    {
        $condition = new Condition();
        $condition->setLeft(123);
        $condition->setOperator(new LessThan());
        $condition->setRight(123456789);

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
