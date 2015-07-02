<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class NotEquals extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        return $left !== $right;
    }

    public function getLabel()
    {
        return 'does not equal';
    }
}
