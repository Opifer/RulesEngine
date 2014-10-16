<?php

namespace Opifer\RulesEngine\Rule;

use Opifer\RulesEngine\Environment\EnvironmentInterface;

use JMS\Serializer\Annotation as JMS;

/**
 * RuleSet
 *
 * @JMS\ExclusionPolicy("none")
 */
class RuleSet extends Rule
{

    /**
     * @var array
     *
     * @JMS\Type("array<Opifer\RulesEngine\Rule\Rule>")
     */
    protected $children = array();

    public function evaluate(EnvironmentInterface $environment)
    {
        foreach ($this->children as $child) {
            $child->evaluate($environment);
        }
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    public function addChild(Rule $child)
    {
        array_push($this->children, $child);

        return $this;
    }

    public function getName()
    {
        return 'Rule Set';
    }

    public function getGroup()
    {
        return null;
    }
}
