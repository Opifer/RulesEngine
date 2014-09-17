<?php

namespace Opifer\RulesEngine\Rule\Condition;

use Opifer\RulesEngine\Environment\Environment;

class AddressValueCityCondition extends ValueCondition
{
    /**
     * @var array
     */
    protected $operatorOpts = array('equals', 'notequals', 'contains');

    /**
     * Evaluate
     *
     * @param Environment $env
     */
    public function evaluate(Environment $env)
    {
        $qb = $env->queryBuilder;

        $paramName = $env->newParamName();
        $paramValue = $env->newParamName();

        $paramContent = $env->newParamName();
        $paramVs = $env->newParamName();
        $paramValues = $env->newParamName();
        $paramAttribute = $env->newParamName();
        $paramAddress = $env->newParamName();

        $subQuery = $env->cloneQueryBuilder();

        $rootAliases = $subQuery->getRootAliases();
        $subQuery
            ->innerJoin($rootAliases[0].'.valueSet', $paramVs)
            ->innerJoin($paramVs.'.values', $paramValues)
            ->innerJoin($paramValues.'.attribute', $paramAttribute)
            ->innerJoin($paramValues . '.address', $paramAddress)
            ->andWhere($paramAttribute.'.name = :'.$paramName);

        switch ($this->operator) {
            case 'equals':
                $subQuery->andWhere($paramAddress.'.city = :'.$paramValue);
                $qb->setParameter($paramValue, $this->getRight()->getValue());
                break;
            case 'notequals':
                $subQuery->andWhere($paramAddress.'.city <> :'.$paramValue);
                $qb->setParameter($paramValue, $this->getRight()->getValue());
                break;
            case 'contains':
                $subQuery->andWhere($paramAddress.'.city LIKE :'.$paramValue);
                $qb->setParameter($paramValue, '%'. $this->getRight()->getValue().'%');
                break;
        }

        $qb
            ->andWhere($qb->expr()->in('a', $subQuery->getDQL()))
            ->setParameter($paramName, $this->getAttribute())
        ;

        // doctrineDump($qb->getDql());
    }
}
