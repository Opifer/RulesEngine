<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Context\DoctrineContext;

abstract class DoctrineOperator extends Operator implements OperatorInterface
{
    /**
     * @var DoctrineContext
     */
    protected $context;

    /**
     * Make the DoctrineContext available in the operator
     *
     * @param DoctrineContext $context
     */
    public function setContext(DoctrineContext $context)
    {
        $this->context = $context;
    }
}
