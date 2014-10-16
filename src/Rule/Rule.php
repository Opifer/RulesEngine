<?php

namespace Opifer\RulesEngine\Rule;

use Opifer\RulesEngine\Environment\EnvironmentInterface;
use Opifer\RulesEngine\Condition\Condition;
use Opifer\RulesEngine\Value\Value;
use JMS\Serializer\Annotation as JMS;

/**
 * Rule
 *
 * @JMS\ExclusionPolicy("none")
 * @JMS\Discriminator(field = "_class", map = {
 *    "Rule": "Opifer\RulesEngine\Rule\Rule",
 *    "RuleSet": "Opifer\RulesEngine\Rule\RuleSet",
 *    "Condition": "Opifer\RulesEngine\Rule\Condition\Condition",
 *    "ConditionSet": "Opifer\RulesEngine\Rule\Condition\ConditionSet",
 *    "AttributeCondition": "Opifer\RulesEngine\Rule\Condition\AttributeCondition",
 *    "EntityCondition": "Opifer\RulesEngine\Rule\Condition\EntityCondition",
 *    "ValueCondition": "Opifer\RulesEngine\Rule\Condition\ValueCondition",
 *    "StringCondition": "Opifer\RulesEngine\Rule\Condition\StringCondition",
 *    "StringValueCondition": "Opifer\RulesEngine\Rule\Condition\StringValueCondition",
 *    "CheckListValueCondition": "Opifer\RulesEngine\Rule\Condition\CheckListValueCondition",
 *    "AddressValueCityCondition": "Opifer\RulesEngine\Rule\Condition\AddressValueCityCondition",
 *    "TemplateCondition": "Opifer\RulesEngine\Rule\Condition\TemplateCondition",
 *    "BaseCondition": "Opifer\RulesEngine\Rule\Condition\BaseCondition"
 * })
 */
abstract class Rule
{

    /**
     * @JMS\Type("array<Opifer\RulesEngine\Value\Value>");
     *
     * @var array
     */
    protected $values;

    /**
     *
     * @JMS\VirtualProperty
     * @JMS\SerializedName("name")
     *
     * @return string
     */
    public function getName()
    {

    }

    public function getValues()
    {
        return $this->values;
    }

    public function setValues($values)
    {
        $this->values = $values;

        return $this;
    }

    abstract public function evaluate(EnvironmentInterface $environment);
}
