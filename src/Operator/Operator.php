<?php

namespace Opifer\RulesEngine\Operator;

use JMS\Serializer\Annotation as JMS;

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
