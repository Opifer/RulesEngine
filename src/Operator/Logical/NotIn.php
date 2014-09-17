<?php

namespace Opifer\RulesEngine\Operator;

class NotIn extends Operator
{
    public function evaluate(Rule $rule)
    {
        if (is_array($rule->getLeft()) && is_array($rule->getRight())) {
            return (count(array_intersect($rule->getLeft(), $rule->getRight()))) ? false : true;
        } elseif (is_array($rule->getLeft()) && !is_array($rule->getRight())) {
            return !in_array($rule->getRight(), $rule->getLeft());
        } elseif (!is_array($rule->getLeft()) && is_array($rule->getRight())) {
            return !in_array($rule->getLeft(), $rule->getRight());
        }

        return false;
    }

    public function getLabel()
    {
        return 'does not exist in';
    }
}
