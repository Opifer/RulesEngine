<?php

namespace Opifer\RulesEngine\Operator;

abstract class LogicalOperator extends Operator implements OperatorInterface
{
    public function evaluate($left, $right)
    {
        // Override in your operator
    }

    public function getLabel()
    {
        $class = explode('\\', get_class($this));
        $class = end($class);

        return strtolower($class);
    }
}
