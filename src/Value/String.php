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
     *
     * @JMS\Expose
     * @JMS\Type("string")
     *
     * @return string
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
