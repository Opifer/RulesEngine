<?php

namespace Opifer\RulesEngine\Condition;

class ConditionTest extends \PHPUnit_Framework_TestCase
{
    public function testSetLeftAsArray()
    {
        $expected = '[1,2,3]';
        $condition = new Condition();
        $condition->setLeft([1,2,3]);

        $actual = \PHPUnit_Framework_Assert::readAttribute($condition, 'left');

        $this->assertEquals($expected, $actual);

        $array = $condition->getLeft();

        $this->assertEquals([1,2,3], $array);
    }

    public function testSetLeftAsString()
    {
        $expected = 'some string value';
        $condition = new Condition();
        $condition->setLeft($expected);

        $actual = \PHPUnit_Framework_Assert::readAttribute($condition, 'left');

        $this->assertEquals($expected, $actual);

        $string = $condition->getLeft();

        $this->assertEquals($expected, $string);
    }

    public function testSetRightAsArray()
    {
        $expected = '[1,2,3]';
        $condition = new Condition();
        $condition->setRight([1,2,3]);

        $actual = \PHPUnit_Framework_Assert::readAttribute($condition, 'right');

        $this->assertEquals($expected, $actual);

        $array = $condition->getRight();

        $this->assertEquals([1,2,3], $array);
    }

    public function testSetRightAsString()
    {
        $expected = 'some string value';
        $condition = new Condition();
        $condition->setRight($expected);

        $actual = \PHPUnit_Framework_Assert::readAttribute($condition, 'right');

        $this->assertEquals($expected, $actual);

        $string = $condition->getRight();

        $this->assertEquals($expected, $string);
    }
}
