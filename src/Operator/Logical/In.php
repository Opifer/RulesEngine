<?php

namespace Opifer\RulesEngine\Operator\Logical;

use Opifer\RulesEngine\Operator\LogicalOperator;

class In extends LogicalOperator
{
    /**
     * When both sides are array, it will determine if ALL of $rule->getRight()'s items
     * are inside the $param.
     *
     * @param  Opifer\RulesEngine\Rule\Rule
     * @return boolean
     */
    public function evaluate($left, $right)
    {
        if (is_array($left) && is_array($right)) {
            $intersect = array_intersect($left, $right);
            if (array_diff($right, $intersect))
                return false;
            return true;
        } elseif (is_array($left) && !is_array($right)) {
            return in_array($right, $left);
        } elseif (!is_array($left) && is_array($right)) {
            return in_array($left, $right);
        }

        return false;
    }

    public function getLabel()
    {
        return 'exists in';
    }
}
