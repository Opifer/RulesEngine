<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;
use Opifer\RulesEngine\Value\ArrayList;
use Opifer\RulesEngine\Environment\EnvironmentInterface;

class CheckListValueCondition extends AttributeCondition
{

    /**
     *
     * @var Opifer\RulesEngine\Value\Value
     *
     * @JMS\Expose
     * @JMS\Type("Opifer\RulesEngine\Value\ArrayList")
     */
    protected $right;

    /**
     *
     * @var array
     *
     * @JMS\Type("array")
     */
    protected $operatorOpts = array('in', 'notin');

    /**
     *
     * @var array
     *
     * @JMS\Type("array")
     */
    protected $options = array();

    public function __construct()
    {
        parent::__construct();
        $this->right = new ArrayList();
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

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

        $paramVs = $env->newParamName();
        $paramValues = $env->newParamName();
        $paramAttribute = $env->newParamName();
        $paramOption = $env->newParamName();

        $subQuery = $env->cloneQueryBuilder();

        $rootAliases = $subQuery->getRootAliases();
        $subQuery
                ->innerJoin($rootAliases[0] . '.valueSet', $paramVs)
                ->innerJoin($paramVs . '.values', $paramValues)
                ->innerJoin($paramValues . '.attribute', $paramAttribute)
                ->innerJoin($paramValues . '.options', $paramOption)
                ->andWhere($paramAttribute . '.name = :' . $paramName);

        $subQuery->andWhere($paramOption . '.id IN (:' . $paramValue . ')');
        $qb->setParameter($paramValue, $this->getRight()->getValue());

        switch ($this->operator) {
            case 'in':
                $qb->andWhere($qb->expr()->in('a', $subQuery->getDQL()));
                break;
            case 'notin':
                $qb->andWhere($qb->expr()->notin('a', $subQuery->getDQL()));
                break;
        }

        $qb->setParameter($paramName, $this->getAttribute());
    }

}
