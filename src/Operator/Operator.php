<?php

namespace Opifer\RulesEngine\Operator;

/**
 *
 */
abstract class Operator
{
    /**
     * {@inheritDoc}
     */
    public function evaluate($left, $right)
    {
    }

    /**
     * {@inheritDoc}
     */
    public function getLabel()
    {
    }
}
