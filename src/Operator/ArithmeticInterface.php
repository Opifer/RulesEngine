<?php

namespace Opifer\RulesEngine\Operator;

interface ArithmeticInterface
{
    /**
     * @param \Opifer\RulesEngine\Rule\Rule $rule
     */
    public function add(Rule $rule);

    /**
     * @param \Opifer\RulesEngine\Rule\Rule $rule
     */
    public function subtract(Rule $rule);

    /**
     * @param \Opifer\RulesEngine\Rule\Rule $rule
     */
    public function divide(Rule $rule);

    /**
     * @param \Opifer\RulesEngine\Rule\Rule $rule
     */
    public function multiply(Rule $rule);
}
