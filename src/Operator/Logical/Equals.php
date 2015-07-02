<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class Equals extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        return $left === $right;
    }

    //public function evaluate(Rule $rule)
    //{
    //    return $rule->getLeft() === $rule->getRight();
    //}
}
