<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class NotEqualsTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new NotEquals();
        $this->assertTrue($operator->evaluate('string', 'someotherstring'));
        $this->assertTrue($operator->evaluate(123, 123456789));
        $this->assertFalse($operator->evaluate('same string', 'same string'));
        $this->assertFalse($operator->evaluate(1234, 1234));
    }

    public function testSerialize()
    {
        $condition = new Condition();
        $condition->setLeft('string');
        $condition->setOperator(new NotEquals());
        $condition->setRight('someotherstring');

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
