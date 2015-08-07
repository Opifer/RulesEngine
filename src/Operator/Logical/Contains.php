<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class Contains extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        if (is_array($left)) {
            return in_array($right, $left);
        } else {
            return (false === strpos($left, $right)) ? false : true;
        }
    }
}
