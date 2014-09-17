<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Environment\Environment;
use Opifer\RulesEngine\Rule\Rule;
use Opifer\RulesEngine\Rule\Condition\Condition;

class DoctrineOperator extends Operator implements LogicalInterface
{
    public function equals(Environment $env, Condition $rule)
    {
        $param = $env->newParamName();

        $env->queryBuilder->where('a.'.$rule->getAttribute() . ' = :' .$param);
        $env->queryBuilder->setParameter($param, $rule->getRight()->getValue());
    }

    public function notequals(Environment $env, Condition $rule)
    {

    }

    public function in(Environment $env, Condition $rule)
    {
        $param = $env->newParamName();

        $env->queryBuilder->where('a.'.$rule->getAttribute() . ' IN (:' .$param . ')');

        $ids = $rule->getRight()->getValue();

        $env->queryBuilder->setParameter($param, $ids);
    }
}
