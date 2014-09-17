<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Rule\Rule;

class Contains extends Operator
{
    public function evaluate(Rule $rule)
    {
        if (is_array($rule->getLeft())) {
            return in_array($rule->getRight(), $rule->getLeft());
        } else {
            return (false === strpos($rule->getLeft(), $rule->getRight())) ? false : true;
        }
    }

    public function getLabel()
    {
        return 'contains';
    }
}
