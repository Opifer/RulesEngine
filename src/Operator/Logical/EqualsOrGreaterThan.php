<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class EqualsOrGreaterThan extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        return $left >= $right;
    }

    public function getLabel()
    {
        return 'equals or is greater than';
    }
}
