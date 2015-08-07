<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class In extends LogicalOperator
{
    /**
     * {@inheritDoc}
     */
    public function evaluate($left, $right)
    {
        if (is_array($left) && is_array($right)) {
            $intersect = array_intersect($right, $left);
            if (array_diff($left, $intersect)) {
                return false;
            }

            return true;
        } elseif (is_array($left) && !is_array($right)) {
            return false;
        } elseif (!is_array($left) && is_array($right)) {
            return in_array($left, $right);
        }

        return (false === strpos($right, $left)) ? false : true;
    }
}
