<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;
use Opifer\RulesEngine\Value\ArrayList;
use Opifer\RulesEngine\Environment\EnvironmentInterface;

class TemplateCondition extends AttributeCondition
{
    /**
     * @var array
     */
    protected $operatorOpts = array('in', 'notin');

    /**
     *
     * @var string
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

        $paramTemplate = $env->newParamName();
        $paramValue = $env->newParamName();
        $paramVs = $env->newParamName();

        $rootAliases = $qb->getRootAliases();
        
        $qb->innerJoin($rootAliases[0] . '.valueSet', $paramVs)
            ->innerJoin($paramVs . '.template', $paramTemplate);

        switch ($this->operator) {
            case 'in':
                $qb->andWhere($paramTemplate . '.id IN (:' . $paramValue . ')');
                break;
            case 'notin':
                $qb->andWhere($paramTemplate . '.id NOT IN (:' . $paramValue . ')');
                break;
        }

        $qb->setParameter($paramValue, $this->getRight()->getValue());
    }
}
