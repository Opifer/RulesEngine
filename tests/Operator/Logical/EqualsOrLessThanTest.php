<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class EqualsOrLessThanTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new EqualsOrLessThan();
        $this->assertTrue($operator->evaluate(123, 123));
        $this->assertTrue($operator->evaluate(123, 1234));
        $this->assertFalse($operator->evaluate(12345, 1234));
    }

    public function testSerialize()
    {
        $condition = new Condition();
        $condition->setLeft('string');
        $condition->setOperator(new EqualsOrLessThan());
        $condition->setRight('somelongstring');

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
