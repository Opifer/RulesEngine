<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;
use Opifer\RulesEngine\Value\ArrayList;

/**
 * Entity Condition
 */
class EntityCondition extends BaseCondition
{
    /**
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $name;

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
    protected $operator;

    /**
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("Opifer\RulesEngine\Value\ArrayList")
     */
    protected $right;

    /**
     * @var array
     *
     * @JMS\Type("array")
     */
    protected $operatorOpts = array();

    /**
     * @var string
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $configuration;

    /**
     * @var string
     *
     * @deprecated
     *
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $searchUrl;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->right = new ArrayList();
    }

    /**
     * Get the left part
     */
    public function getLeft()
    {
        return $this->subject->getId();
    }

    /**
     * Get attribute
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Set attribute
     *
     * @param  string $attribute
     *
     * @return EntityCondition
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Set name
     *
     * @param  string   $name
     *
     * @return EntityCondition
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the entity
     *
     * @param string $entity
     *
     * @return EntityCondition
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

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
     * Set the operator options
     *
     * @param  array $operatorOpts
     *
     * @return EntityCondition
     */
    public function setOperatorOpts(array $operatorOpts)
    {
        $this->operatorOpts = $operatorOpts;

        return $this;
    }

    /**
     * Get operator options
     *
     * @return array
     */
    public function getOperatorOpts()
    {
        return $this->operatorOpts;
    }

    /**
     * Set the configuration
     *
     * @param string $configuration
     *
     * @return EntityCondition
     */
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;

        return $this;
    }

    /**
     * Get configuration
     *
     * @return string
     */
    public function getConfiguration()
    {
        return $this->configuration;
    }

    /**
     * Get the right part
     *
     * @return mixed
     */
    public function getRight()
    {
        return $this->right;
    }
}
