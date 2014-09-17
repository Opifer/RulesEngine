<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Rule\Rule;

class In extends Operator
{
    /**
     * When both sides are array, it will determine if ALL of $rule->getRight()'s items
     * are inside the $param.
     *
     * @param  Opifer\RulesEngine\Rule\Rule
     * @return boolean
     */
    public function evaluate(Rule $rule)
    {
        if (is_array($rule->getLeft()) && is_array($rule->getRight())) {
            $intersect = array_intersect($rule->getLeft(), $rule->getRight());
            if (array_diff($rule->getRight(), $intersect))
                return false;
            return true;
        } elseif (is_array($rule->getLeft()) && !is_array($rule->getRight())) {
            return in_array($rule->getRight(), $rule->getLeft());
        } elseif (!is_array($rule->getLeft()) && is_array($rule->getRight())) {
            return in_array($rule->getLeft(), $rule->getRight());
        }

        return false;
    }

    public function getLabel()
    {
        return 'exists in';
    }
}
