<?php

namespace Opifer\RulesEngine\Operator\Logical;

use JMS\Serializer\SerializerBuilder;
use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\RulesEngine;

class ContainsTest extends \PHPUnit_Framework_TestCase
{
    public function testSerialising()
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
}
