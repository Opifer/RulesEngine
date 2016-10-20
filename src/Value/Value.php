<?php

namespace Opifer\RulesEngine\Value;

use JMS\Serializer\Annotation as JMS;

/**
 * Value
 *
 * @JMS\ExclusionPolicy("none")
 * @JMS\Discriminator(field = "_class", map = {
 *    "Value": "Opifer\RulesEngine\Value\Value",
 *    "String": "Opifer\RulesEngine\Value\StringValue",
 *    "ArrayList": "Opifer\RulesEngine\Value\ArrayList"
 * })
 */
abstract class Value
{
}
