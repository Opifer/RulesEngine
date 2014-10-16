<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;

use Opifer\RulesEngine\Environment\EnvironmentInterface;

class StringCondition extends AttributeCondition
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
     * @JMS\Type("Opifer\RulesEngine\Value\String")
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
        
        $paramValue = $env->newParamName();

        switch ($this->operator) {
            case 'equals':
                $qb->andWhere($this->attribute.' = :'.$paramValue);
                $qb->setParameter($paramValue, $this->getRight()->getValue());
                break;
            case 'notequals':
                $qb->andWhere($this->attribute.' <> :'.$paramValue);
                $qb->setParameter($paramValue, $this->getRight()->getValue());
                break;
            case 'contains':
                $qb->andWhere($this->attribute.' LIKE :'.$paramValue);
                $qb->setParameter($paramValue, '%'. $this->getRight()->getValue().'%');
                break;
        }
    }
}
