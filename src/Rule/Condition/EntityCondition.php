<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;
use Opifer\RulesEngine\Value\ArrayList;

class EntityCondition extends BaseCondition
{

    /**
     *
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $name;

    /**
     *
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $entity;

    /**
     *
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $attribute;
    
    /**
     *
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $operator;

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
    protected $operatorOpts = array();

    public function __construct()
    {
        $this->right = new ArrayList();
    }

    public function getLeft()
    {
        return $this->subject->getId();
    }

    public function getAttribute()
    {
        return $this->attribute;
    }

    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Set name
     *
     * @param  string   $name
     * @return Template
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }
    public function getOperatorOpts()
    {
        return $this->operatorOpts;
    }

    public function setOperatorOpts($operatorOpts)
    {
        $this->operatorOpts = $operatorOpts;

        return $this;
    }

    public function getRight()
    {
        return $this->right;
    }
}
