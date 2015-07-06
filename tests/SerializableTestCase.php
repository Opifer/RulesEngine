<?php

namespace Opifer\RulesEngine;

abstract class SerializableTestCase extends \PHPUnit_Framework_TestCase
{
    public function assertSerializable($var)
    {
        $rulesEngine = new RulesEngine();
        $json = $rulesEngine->serialize($var);

        $actual = $rulesEngine->deserialize($json);

        $this->assertEquals($var, $actual);
    }
}
