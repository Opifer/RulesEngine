<?php

namespace Opifer\RulesEngine\Condition;

use Opifer\RulesEngine\Context\Context;

class ConditionSet implements \ArrayAccess, \IteratorAggregate
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

    public function removeCondition(Condition $condition)
    {
        // todo
    }

    /**
     * Checks whether this conditionset has conditions
     *
     * @return bool
     */
    public function hasConditions()
    {
        return count($this->conditions) ? true : false;
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

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->conditions);
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->conditions[$offset]);
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetGet($offset)
    {
        return $this->conditions[$offset];
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetSet($offset, $value)
    {
        if ( ! isset($offset)) {
            return $this->conditions[] = $value;
        }

        $this->conditions[$offset] = $value;
    }

    /**
     * Required by interface ArrayAccess.
     *
     * {@inheritDoc}
     */
    public function offsetUnset($offset)
    {
        unset($this->conditions[$offset]);

        return;
    }
}
