<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Rule\Rule;

class NotMatchRegex extends Operator
{
    public function evaluate(Rule $rule)
    {
        return (preg_match($rule->getLeft(), $rule->getRight())) ? false : true;
    }

    public function getLabel()
    {
        return 'does not match regex';
    }
}
