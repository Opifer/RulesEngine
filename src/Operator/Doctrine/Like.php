<?php

namespace Opifer\RulesEngine\Operator\Doctrine;

use Opifer\RulesEngine\Operator\DoctrineOperator;
use Opifer\RulesEngine\Operator\OperatorInterface;

class Like extends DoctrineOperator implements OperatorInterface
{
    public function evaluate($left, $right)
    {
        $param = $this->context->generateParameter();

        $this->context->getQueryBuilder()->andWhere($left.' LIKE :'.$param);
        $this->context->getQueryBuilder()->setParameter($param, '%'.$right.'%');
    }
}
