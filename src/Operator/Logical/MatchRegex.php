<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class MatchRegex extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        return (preg_match($right, $left)) ? true : false;
    }
}
