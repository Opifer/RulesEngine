<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class GreaterThan extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        return $left > $right;
    }
}
