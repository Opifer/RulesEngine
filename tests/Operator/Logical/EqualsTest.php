<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class EqualsTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new Equals();
        $this->assertTrue($operator->evaluate('string', 'string'));
        $this->assertTrue($operator->evaluate(1234, 1234));
        $this->assertFalse($operator->evaluate('string', 'someotherstring'));
        $this->assertFalse($operator->evaluate(1234, 2345));
    }

    public function testSerialize()
    {
        $condition = new Condition();
        $condition->setLeft('somelongstring');
        $condition->setOperator(new Equals());
        $condition->setRight('long');

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
