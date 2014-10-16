<?php

namespace Opifer\RulesEngine\Value;

interface ValueInterface
{
    public function getValue();

    public function setValue($value);
}
