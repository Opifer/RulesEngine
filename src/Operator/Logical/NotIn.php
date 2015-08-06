<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class NotIn extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        if (is_array($left) && is_array($right)) {
            return (count(array_intersect($left, $right))) ? false : true;
        } elseif (is_array($left) && !is_array($right)) {
            return !in_array($right, $left);
        } elseif (!is_array($left) && is_array($right)) {
            return !in_array($left, $right);
        }

        return false;
    }
}
