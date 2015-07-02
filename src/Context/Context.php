<?php

namespace Opifer\RulesEngine\Context;

use Opifer\RulesEngine\Condition\Condition;

class Context
{
    /**
     * @param Condition $condition
     *
     * @return mixed
     */
    public function evaluate(Condition $condition)
    {
        $operator = $condition->getOperator();

        return $operator->evaluate($condition->getLeft(), $condition->getRight());
    }
}
