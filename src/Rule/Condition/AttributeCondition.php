<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;

use Opifer\RulesEngine\Environment\EnvironmentInterface;
use Opifer\RulesEngine\Value\String;

class AttributeCondition extends BaseCondition
{
    /**
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $entity;

    /**
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $attribute;

    /**
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $type;

    /**
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("Opifer\RulesEngine\Value\String")
     */
    protected $right;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->right = new String();
    }

    /**
     * @JMS\PreSerialize
     */
    public function setDefaultOperator()
    {
        if (!$this->operator && count($this->operatorOpts)) {
            $this->operator = $this->operatorOpts[0];
        }
    }

    /**
     * Evaluate
     *
     * @param Environment $env
     */
    public function evaluate(EnvironmentInterface $env)
    {
        $qb = $env->queryBuilder;
        
        $value = $env->newParamName();

        switch ($this->operator) {
            case 'equals':
                $qb->andWhere('a.'.$this->attribute.' = :'.$value);
                $qb->setParameter($value, $this->getRight()->getValue());
                break;
            case 'notequals':
                $qb->andWhere('a.'.$this->attribute.' <> :'.$value);
                $qb->setParameter($value, $this->getRight()->getValue());
                break;
            case 'contains':
                $qb->andWhere('a.'.$this->attribute.' LIKE :'.$value);
                $qb->setParameter($value, '%'. $this->getRight()->getValue().'%');
                break;
            case 'greaterthan':
                $qb->andWhere('a.'.$this->attribute.' > :'.$value);
                $qb->setParameter($value, $this->getRight()->getValue());
                break;
            case 'lessthan':
                $qb->andWhere('a.'.$this->attribute.' < :'.$value);
                $qb->setParameter($value, $this->getRight()->getValue());
                break;
        }
    }

    /**
     * Get left
     *
     * @return mixed
     */
    public function getLeft()
    {
        $method = 'get' . $this->attribute;

        return $this->subject->$method();
    }

    /**
     * Get right
     *
     * @return mixed
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * Get attribute
     *
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Set attribute
     *
     * @param string $attribute
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Get entity
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set entity
     *
     * @param string $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

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
