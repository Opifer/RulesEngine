<?php

namespace Opifer\RulesEngine\Rule\Condition;

use JMS\Serializer\Annotation as JMS;

abstract class BaseCondition extends Condition
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
    protected $group;

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
     * @JMS\Type("Opifer\RulesEngine\Value\Value")
     */
    protected $right;

    /**
     *
     * @var array
     *
     * @JMS\Type("array")
     */
    protected $operatorOpts = array();

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function setOperatorOpts(array $operatorOpts)
    {
        $this->operatorOpts = $operatorOpts;

        return $this;
    }

    public function getOperatorOpts()
    {
        return $this->operatorOpts;
    }
}
