<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;

class AttributeCondition extends BaseCondition
{

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

    public function __construct()
    {
        $this->right = new \Opifer\RulesEngine\Value\String();
    }

    public function getLeft()
    {
        $method = 'get' . $this->attribute;

        return $this->subject->$method();
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

    public function getEntity()
    {
        return $this->entity;
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    public function getRight()
    {
        return $this->right;
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

}
