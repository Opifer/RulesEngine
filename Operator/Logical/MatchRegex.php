<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Rule\Rule;

class MatchRegex extends Operator
{
    public function evaluate(Rule $rule)
    {
        return (preg_match($rule->getLeft(), $rule->getRight())) ? true : false;
    }

    public function getLabel()
    {
        return 'matches regex';
    }
}
