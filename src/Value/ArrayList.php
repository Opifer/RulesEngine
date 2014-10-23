<?php

namespace Opifer\RulesEngine\Value;

use JMS\Serializer\Annotation as JMS;

/**
 * String
 *
 * @JMS\ExclusionPolicy("none")
 */
class ArrayList extends Value implements ValueInterface
{
    /**
     * @var array
     * 
     * @JMS\Expose
     * @JMS\Type("array")
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
