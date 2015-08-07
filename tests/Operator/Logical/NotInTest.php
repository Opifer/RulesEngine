<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class NotInTest extends \PHPUnit_Framework_TestCase
{
    public function testEvaluate()
    {
        $operator = new NotIn();
        $this->assertTrue($operator->evaluate('something completely different', 'some other string'));
        $this->assertTrue($operator->evaluate(7, [1,2,3]));
        $this->assertTrue($operator->evaluate([4,5], [1,2,3]));
        $this->assertFalse($operator->evaluate([1,2], [1,2,3]));
        $this->assertFalse($operator->evaluate('some', 'some string'));
        $this->assertFalse($operator->evaluate(2, [1,2,3]));
    }

    public function testSerialize()
    {
        $condition = new Condition();
        $condition->setLeft('string');
        $condition->setOperator(new NotIn());
        $condition->setRight('somelongstring');

        $set = new ConditionSet();
        $set->addCondition($condition);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
