<?php

namespace Opifer\RulesEngine\Value;

use JMS\Serializer\Annotation as JMS;

/**
 * String
 *
 * @JMS\ExclusionPolicy("none")
 */
class String extends Value implements ValueInterface
{
    /**
     * @var string
     * 
     * @JMS\Expose
     * @JMS\Type("string")
     */
    protected $value;

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}
