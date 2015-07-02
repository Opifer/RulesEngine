<?php

namespace Opifer\RulesEngine\Condition;

class Condition
{
    /**
     * @var mixed
     */
    protected $left;

    /**
     * @var \Opifer\RulesEngine\Operator\OperatorInterface
     */
    protected $operator;

    /**
     * @var mixed
     */
    protected $right;

    /**
     * @var array
     */
    protected $availableOperators;

    /**
     * @var array
     */
    protected $availableRights;

    /**
     * @return mixed
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @param mixed $left
     */
    public function setLeft($left)
    {
        $this->left = $left;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param mixed $operator
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRight()
    {
        return $this->right;
    }

    /**
     * @param mixed $right
     */
    public function setRight($right)
    {
        $this->right = $right;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailableOperators()
    {
        return $this->availableOperators;
    }

    /**
     * @param mixed $availableOperators
     */
    public function setAvailableOperators($availableOperators)
    {
        $this->availableOperators = $availableOperators;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvailableRights()
    {
        return $this->availableRights;
    }

    /**
     * @param mixed $availableRights
     */
    public function setAvailableRights($availableRights)
    {
        $this->availableRights = $availableRights;

        return $this;
    }
}
