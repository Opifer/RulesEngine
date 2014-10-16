<?php

namespace Opifer\RulesEngine\Environment;

use Opifer\RulesEngine\Operator\Operator;
use Opifer\RulesEngine\Rule\Rule;

class Environment implements EnvironmentInterface
{
    /**
     * Evaluate
     *
     * @param Rule $rule
     *
     * @return void
     */
    public function evaluate(Rule $rule)
    {
        $rule->evaluate($this);
    }

    /**
     * Get operator
     *
     * @return Operator
     */
    public function getOperator()
    {
        return new Operator();
    }
}
