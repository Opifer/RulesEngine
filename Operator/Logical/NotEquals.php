<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Rule\Rule;

class NotEquals extends Operator
{
    public function evaluate(Rule $rule)
    {
        return $rule->getLeft() !== $rule->getRight();
    }

    public function getLabel()
    {
        return 'does not equal';
    }
}
