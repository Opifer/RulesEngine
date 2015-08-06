<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class NotMatchRegex extends LogicalOperator
{
    public function evaluate($left, $right)
    {
        return (preg_match($left, $right)) ? false : true;
    }
}
