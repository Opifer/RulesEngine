<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Context\DoctrineContext;

abstract class DoctrineOperator extends Operator implements OperatorInterface
{
    protected $context;

    public function setContext(DoctrineContext $context)
    {
        $this->context = $context;
    }

    public function evaluate($left, $right)
    {
        // Override in your operator
    }

    public function getLabel()
    {
        $class = explode('\\', get_class($this));
        $class = end($class);

        return strtolower($class);
    }
}
