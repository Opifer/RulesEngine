<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class MatchRegexTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new MatchRegex();
        $this->assertTrue($operator->evaluate(123, '/^[0-9]/'));
        $this->assertFalse($operator->evaluate('a random string', '/^[0-9]/'));
    }

    public function testSerialize()
    {
        $condition = new Condition();
        $condition->setLeft(123);
        $condition->setOperator(new MatchRegex());
        $condition->setRight('/[1-9]/$');

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
