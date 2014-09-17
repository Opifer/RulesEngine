<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Rule\Rule;

class NotContains extends Operator
{
    public function evaluate(Rule $rule)
    {
        if (is_array($rule->getLeft())) {
            return !in_array($rule->getRight(), $rule->getLeft());
        } else {
            return (false === strpos($rule->getLeft(), $rule->getRight())) ? true : false;
        }
    }

    public function getLabel()
    {
        return 'does not contain';
    }
}
