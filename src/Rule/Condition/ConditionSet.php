<?php

namespace Opifer\RulesEngine\Rule\Condition;

use Opifer\RulesEngine\Environment\EnvironmentInterface;
use Opifer\RulesEngine\Rule\RuleSet;
use JMS\Serializer\Annotation as JMS;

/**
 * ConditionSet
 *
 */
class ConditionSet extends RuleSet
{

    /**
     *
     * @JMS\Expose
     * @JMS\Type("boolean")
     *
     * @var boolval
     */
    public $boolval = true;

    /**
     *
     * @JMS\Expose
     * @JMS\Type("array")
     *
     * @var array
     */
    public $boolvalOpts = array(true, false);

    /**
     *
     * @JMS\Expose
     * @JMS\Type("string")
     *
     * @var string
     */
    public $type = 'all';

    /**
     *
     * @JMS\Expose
     * @JMS\Type("array")
     *
     * @var array
     */
    public $typeOpts = array('all', 'any');

    public function evaluate(EnvironmentInterface $env)
    {
        if (!count($this->children))
            return true;

        foreach ($this->children as $condition) {
            $result = $condition->evaluate($env);

            if ($this->type == 'all' && $this->boolval && $result === false) {
                return false; // alles moet true zijn en er is een false conditie gevonden
            } elseif ($this->type == 'all' && $this->boolval === false && $result === true) {
                return false; //alles moet false zijn er is een true conditie gevonden
            } elseif ($this->type == 'any' && $this->boolval === true && $result === true) {
                return true; // een van de condities moet true zijn er is een true conditie gevonden
            } elseif ($this->type == 'any' && $this->boolval === false && $result === false) {
                return true; // een van de condities moet true zijn er is een true conditie gevonden
            }
        }
        // alle condities zijn afgelopen
        // return een value voor datgene dat niet instant na
        // het checken van een conditie teruggegeven kon worden
        return ($this->type == 'any') ? false : true;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function getName()
    {
        return 'Condition Set';
    }

}
