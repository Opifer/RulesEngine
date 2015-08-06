<?php

namespace Opifer\RulesEngine;

use JMS\Serializer\SerializerBuilder;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\Context\Context;

class RulesEngine
{
    /**
     * Interpret this rule.
     *
     * @param ConditionSet $set
     * @param Context      $context
     *
     * @return bool
     */
    public function interpret($rule, Context $context = null)
    {
        if (!$context) {
            $context = new Context();
        }

        if ($rule instanceof ConditionSet) {
            return $rule->evaluate($context);
        }

        return $context->evaluate($rule);
    }

    /**
     * Serialize a conditionset
     *
     * @param ConditionSet $set
     *
     * @return string
     */
    public function serialize(ConditionSet $set)
    {
        return $this->getSerializer()->serialize($set, 'json');
    }

    /**
     * Deserialize a json string into a conditionset
     *
     * @param string $json
     *
     * @return mixed
     */
    public function deserialize($json)
    {
        return $this->getSerializer()->deserialize($json, 'Opifer\RulesEngine\Condition\ConditionSet', 'json');
    }

    /**
     * @return \JMS\Serializer\Serializer
     */
    public function getSerializer()
    {
        return SerializerBuilder::create()
            ->addMetadataDir(__DIR__.'/Resources/config')
            ->build();
    }
}
