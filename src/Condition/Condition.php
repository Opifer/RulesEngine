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
        if (!$left = json_decode($this->left, true)) {
            return $this->left;
        }

        return $left;
    }

    /**
     * @param mixed $left
     */
    public function setLeft($left)
    {
        if (is_array($left)) {
            $left = json_encode($left);
        }

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
        if (!$right = json_decode($this->right, true)) {
            return $this->right;
        }

        return $right;
    }

    /**
     * @param mixed $right
     */
    public function setRight($right)
    {
        if (is_array($right)) {
            $right = json_encode($right);
        }

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
