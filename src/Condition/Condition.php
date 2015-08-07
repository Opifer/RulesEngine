<?php

namespace Opifer\RulesEngine\Condition;

use Opifer\RulesEngine\Operator\OperatorInterface;

class Condition
{
    /**
     * @var mixed
     */
    protected $left;

    /**
     * @var OperatorInterface
     */
    protected $operator;

    /**
     * @var mixed
     */
    protected $right;

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
     * @return OperatorInterface
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @param OperatorInterface $operator
     */
    public function setOperator(OperatorInterface $operator)
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
}
