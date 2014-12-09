<?php

namespace Opifer\RulesEngine\Rule\Condition;

use Opifer\RulesEngine\Environment\EnvironmentInterface;
use Opifer\RulesEngine\Operator\Operator;
use Opifer\RulesEngine\Rule\Rule;

use JMS\Serializer\Annotation as JMS;

/**
 * Condition
 *
 * @JMS\ExclusionPolicy("none")
 */
abstract class Condition extends Rule
{
    /**
     * @var Operator
     *
     * @JMS\Type("string")
     */
    protected $operator;

    /**
     * Evaluate
     *
     * @param  EnvironmentInterface $env
     *
     * @return mixed
     */
    public function evaluate(EnvironmentInterface $env)
    {
        $method = $this->operator;

        return $env->getOperator()->$method($env, $this);
    }

    /**
     * Get the left part
     */
    public function getLeft()
    {
        // ...
    }

    /**
     * Get the right part
     */
    public function getRight()
    {
        // ...
    }

    /**
     * [getOperator description]
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Set operator
     *
     * @param  string $operator
     *
     * @return Condition
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return 'Condition';
    }
}
