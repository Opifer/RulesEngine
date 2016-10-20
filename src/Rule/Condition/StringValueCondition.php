<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;

use Opifer\RulesEngine\Environment\EnvironmentInterface;

class StringValueCondition extends ValueCondition
{
    /**
     * @var array
     * 
     * @JMS\Expose
     * @JMS\Type("array")
     */
    protected $operatorOpts = array('equals', 'notequals', 'contains');

    /**
     *
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("Opifer\RulesEngine\Value\StringValue")
     */
    protected $right;

    /**
     * Evaluate
     *
     * @param Environment $env
     */
    public function evaluate(EnvironmentInterface $env)
    {
        $qb = $env->queryBuilder;

        $paramName = $env->newParamName();
        $paramValue = $env->newParamName();

        $paramContent = $env->newParamName();
        $paramVs = $env->newParamName();
        $paramValues = $env->newParamName();
        $paramAttribute = $env->newParamName();

        $subQuery = $env->cloneQueryBuilder();

        $rootAliases = $subQuery->getRootAliases();
        $subQuery
            ->innerJoin($rootAliases[0].'.valueSet', $paramVs)
            ->innerJoin($paramVs.'.values', $paramValues)
            ->innerJoin($paramValues.'.attribute', $paramAttribute)
            ->andWhere($paramAttribute.'.name = :'.$paramName);

        switch ($this->operator) {
            case 'equals':
                $subQuery->andWhere($paramValues.'.value = :'.$paramValue);
                $qb->setParameter($paramValue, $this->getRight()->getValue());
                break;
            case 'notequals':
                $subQuery->andWhere($paramValues.'.value <> :'.$paramValue);
                $qb->setParameter($paramValue, $this->getRight()->getValue());
                break;
            case 'contains':
                $subQuery->andWhere($paramValues.'.value LIKE :'.$paramValue);
                $qb->setParameter($paramValue, '%'. $this->getRight()->getValue().'%');
                break;
        }

        $qb
            ->andWhere($qb->expr()->in('a', $subQuery->getDQL()))
            ->setParameter($paramName, $this->getAttribute())
        ;
    }
}
