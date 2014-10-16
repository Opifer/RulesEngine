<?php

namespace Opifer\RulesEngine\Rule\Condition;

interface ConditionInterface
{
    public function getLeft();

    public function getRight();

    public function getOperator();
}
