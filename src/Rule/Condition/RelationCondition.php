<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;

use Opifer\RulesEngine\Environment\EnvironmentInterface;
use Opifer\RulesEngine\Value\String;

class RelationCondition extends AttributeCondition
{
    /**
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $relation;

    /**
     * Evaluate
     *
     * @param Environment $env
     */
    public function evaluate(EnvironmentInterface $env)
    {
        $qb = $env->queryBuilder;
        
        $value = $env->newParamName();

        $joins = $qb->getDqlPart('join');
        if (!isset($joins[$this->relation])) {
            $qb->leftJoin('a.'.$this->relation, $this->relation);
        }

        switch ($this->operator) {
            case 'equals':
                $qb->andWhere($this->relation.'.'.$this->attribute.' = :'.$value);
                $qb->setParameter($value, $this->getRight()->getValue());
                break;
            case 'notequals':
                $qb->andWhere($this->relation.'.'.$this->attribute.' <> :'.$value);
                $qb->setParameter($value, $this->getRight()->getValue());
                break;
            case 'contains':
                $qb->andWhere($this->relation.'.'.$this->attribute.' LIKE :'.$value);
                $qb->setParameter($value, '%'. $this->getRight()->getValue().'%');
                break;
            case 'greaterthan':
                $qb->andWhere($this->relation.'.'.$this->attribute.' > :'.$value);
                $qb->setParameter($value, $this->getRight()->getValue());
                break;
            case 'lessthan':
                $qb->andWhere($this->relation.'.'.$this->attribute.' < :'.$value);
                $qb->setParameter($value, $this->getRight()->getValue());
                break;
        }
    }

    /**
     * Get relation
     *
     * @return string
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * Set relation
     *
     * @param string $relation
     */
    public function setRelation($relation)
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * Set the type and predefine the operatorOpts by type
     */
    public function setType($type)
    {
        $this->type = $type;

        switch ($type) {
            case 'text':
            case 'string':
                $this->operatorOpts = ['equals', 'notequals', 'contains'];
                break;
            case 'integer':
                $this->operatorOpts = ['equals', 'notequals', 'greaterthan', 'lessthan'];
                break;
            case 'boolean':
                $this->operatorOpts = ['equals'];
                break;
        }

        return $this;
    }
}
