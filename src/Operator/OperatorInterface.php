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

    /**
     * Should return a human readable name of the operator.
     *
     * @return string
     */
    public function getLabel();
}
