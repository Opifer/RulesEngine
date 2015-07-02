<?php

namespace Opifer\RulesEngine\Operator\Doctrine;

use Opifer\RulesEngine\Operator\DoctrineOperator;
use Opifer\RulesEngine\Operator\Operator;
use Opifer\RulesEngine\Operator\OperatorInterface;

class In extends DoctrineOperator implements OperatorInterface
{
    public function evaluate($left, $right)
    {
        $param = $this->context->generateParameter();

        $this->context->getQueryBuilder()
            ->andWhere($left . ' IN (:' . $param . ')')
            ->setParameter($param, $right);
    }

    //public function old()
    //{
    //    $env->queryBuilder->where('a.'.$rule->getAttribute() . ' IN (:' .$param . ')');
    //
    //    $ids = $rule->getRight()->getValue();
    //
    //    $env->queryBuilder->setParameter($param, $ids);
    //}
}
