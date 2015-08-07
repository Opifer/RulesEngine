<?php

namespace Opifer\RulesEngine;

use JMS\Serializer\SerializerBuilder;
use Opifer\RulesEngine\Condition\ConditionSet;
use Opifer\RulesEngine\Context\Context;

class RulesEngine
{
    /** @var string */
    protected $configPath;

    /**
     * Constructor
     *
     * @param string $configPath
     */
    public function __construct($configPath = null)
    {
        if ($configPath) {
            $this->configPath = $configPath;
        } else {
            $this->configPath = __DIR__.'/Resources/config';
        }
    }

    /**
     * Interpret the conditionset.
     *
     * @param ConditionSet $set
     * @param Context      $context
     *
     * @return bool
     */
    public function interpret($set, Context $context = null)
    {
        if (!$context) {
            $context = new Context();
        }

        if ($set instanceof ConditionSet) {
            return $set->evaluate($context);
        }

        return $context->evaluate($set);
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
            ->addMetadataDir($this->configPath)
            ->build();
    }
}
