<?php

namespace Opifer\RulesEngine\Operator;

interface OperatorInterface
{
    /**
     * Evaluates the left and right param according to the operator.
     *
     * @param $left
     * @param $right
     *
     * @return mixed
     */
    public function evaluate($left, $right);
}
