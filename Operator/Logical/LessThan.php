<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Rule\Rule;

class LessThan extends Operator
{
    public function evaluate(Rule $rule)
    {
        return $rule->getLeft() < $rule->getRight();
    }

    public function getLabel()
    {
        return 'is less than';
    }
}
