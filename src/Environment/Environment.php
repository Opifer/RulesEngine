<?php

namespace Opifer\RulesEngine\Environment;

use Opifer\RulesEngine\Operator\Operator;
use Opifer\RulesEngine\Rule\Rule;

/**
 * A very simple base environment
 */
class Environment implements EnvironmentInterface
{
    /**
     * Evaluate
     *
     * @param  Rule $rule
     *
     * @return EnvironmentInterface
     */
    public function evaluate(Rule $rule)
    {
        $rule->evaluate($this);

        return $this;
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
