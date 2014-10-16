<?php

namespace Opifer\RulesEngine\Environment;

use Opifer\RulesEngine\Rule\Rule;

interface EnvironmentInterface
{
    public function evaluate(Rule $rule);

    /**
     * Get operator
     *
     * @return Operator
     */
    public function getOperator();
}
