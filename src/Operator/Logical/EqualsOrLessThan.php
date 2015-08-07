<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class EqualsOrLessThan extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        return $left <= $right;
    }
}
