<?php

namespace Opifer\RulesEngine\Operator;

/**
 * Abstract operator
 */
abstract class Operator
{
    /**
     * {@inheritDoc}
     */
    public function evaluate($left, $right)
    {
        // Override in the operator
    }
}
