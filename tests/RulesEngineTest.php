<?php

namespace Opifer\RulesEngine;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\Context\Context;
use Opifer\RulesEngine\Operator\Logical\Contains;
use Opifer\RulesEngine\Operator\Logical\Equals;

class RulesEngineTest extends \PHPUnit_Framework_TestCase
{
    public function testPassingInterpret()
    {
        $operator = new Equals();

        $condition = new Condition();
        $condition->setLeft(1);
        $condition->setOperator($operator);
        $condition->setRight(1);

        $rulesEngine = new RulesEngine();

        $actual = $rulesEngine->interpret($condition);

        $this->assertTrue($actual);
    }

    public function testFailingInterpret()
    {
        $operator = new Equals();

        $condition = new Condition();
        $condition->setLeft(1);
        $condition->setOperator($operator);
        $condition->setRight(2);

        $rulesEngine = new RulesEngine();
        $actual = $rulesEngine->interpret($condition);

        $this->assertFalse($actual);
    }

    public function testSerialize()
    {
        $condition = new Condition();
        $condition->setLeft(1);
        $condition->setOperator(new Equals());
        $condition->setRight(2);

        $condition2 = new Condition();
        $condition2->setLeft('somelongvalue');
        $condition2->setOperator(new Contains());
        $condition2->setRight('long');

        $set = new ConditionSet();
        $set->addCondition($condition);
        $set->addCondition($condition2);

        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($set);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($set, $actual);
    }
}
