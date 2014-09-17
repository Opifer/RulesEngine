<?php

namespace Opifer\RulesEngine\Rule\Condition;

use Opifer\RulesEngine\Environment\Environment;
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

    public function evaluate(Environment $env)
    {
        $method = $this->operator;

        return $env->getOperator()->$method($env, $this);
    }

    public function getLeft() {}

    public function getRight() {}

    public function getOperator()
    {
        return $this->operator;
    }

    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    public function getName()
    {
        return 'Condition';
    }
}
