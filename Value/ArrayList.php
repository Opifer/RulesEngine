<?php

namespace Opifer\RulesEngine\Value;

use JMS\Serializer\Annotation as JMS;

/**
 * String
 *
 * @JMS\ExclusionPolicy("none")
 */
class ArrayList extends Value
{
    /**
     *
     * @JMS\Expose
     * @JMS\Type("array")
     *
     * @return array
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
