<?php

namespace Opifer\RulesEngine\Condition;

use Opifer\RulesEngine\Context\Context;

class ConditionSet
{
    const OPERATOR_AND = 'AND';
    const OPERATOR_OR = 'OR';

    /**
     * @var string
     */
    protected $operator = self::OPERATOR_AND;

    /**
     * @var Condition
     */
    protected $conditions = [];

    /**
     * @param $operator
     *
     * @return $this|bool
     */
    public function setOperator($operator)
    {
        if (!in_array($operator, [self::OPERATOR_AND, self::OPERATOR_OR])) {
            return false;
        }

        $this->operator = $operator;

        return $this;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Add a condition.
     *
     * @param Condition $condition
     *
     * @return $this
     */
    public function addCondition(Condition $condition)
    {
        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * @return array
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * @param Context $context
     *
     * @return bool
     */
    public function Evaluate(Context $context)
    {
        foreach ($this->getConditions() as $condition) {
            $evaluated = $context->evaluate($condition);

            if (!$evaluated) {
                return false;
            }
        }

        return true;
    }
}
