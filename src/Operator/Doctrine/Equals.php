<?php

namespace Opifer\RulesEngine\Operator\Doctrine;

use Opifer\RulesEngine\Operator\DoctrineOperator;
use Opifer\RulesEngine\Operator\Operator;
use Opifer\RulesEngine\Operator\OperatorInterface;

class Equals extends DoctrineOperator implements OperatorInterface
{
    public function evaluate($left, $right)
    {
        $param = $this->context->generateParameter();

        $this->context->getQueryBuilder()->andWhere($left . ' = :' .$param);
        $this->context->getQueryBuilder()->setParameter($param, $right);
    }

    //public function old()
    //{
    //    $this->getQueryBuilder()->andWhere('a.'.$rule->getAttribute() . ' = :' .$param);
    //    $this->getQueryBuilder()->setParameter($param, $rule->getRight()->getValue());
    //}
}
