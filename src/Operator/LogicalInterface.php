<?php

namespace Opifer\RulesEngine\Operator;

use Opifer\RulesEngine\Environment\Environment;
use Opifer\RulesEngine\Rule\Rule;
use Opifer\RulesEngine\Rule\Condition\Condition;

interface LogicalInterface
{
    public function equals(Environment $env, Condition $rule);
    public function notequals(Environment $env, Condition $rule);
}
