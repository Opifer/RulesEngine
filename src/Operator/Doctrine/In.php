<?php

namespace Opifer\RulesEngine\Operator\Doctrine;

use Opifer\RulesEngine\Operator\DoctrineOperator;
use Opifer\RulesEngine\Operator\OperatorInterface;

class In extends DoctrineOperator implements OperatorInterface
{
    /**
     * @inheritDoc
     */
    public function evaluate($left, $right)
    {
        $param = $this->context->generateParameter();

        $this->context->getQueryBuilder()->andWhere($left.' IN (:'.$param.')');
        $this->context->getQueryBuilder()->setParameter($param, $right);
    }
}
