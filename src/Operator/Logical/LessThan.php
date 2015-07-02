<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class LessThan extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        return $left < $right;
    }

    public function getLabel()
    {
        return 'is less than';
    }
}
