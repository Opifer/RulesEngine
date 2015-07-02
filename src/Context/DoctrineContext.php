<?php

namespace Opifer\RulesEngine\Context;

use Doctrine\ORM\QueryBuilder;
use Doctrine\Common\Collections\ArrayCollection;
use Opifer\RulesEngine\Condition\Condition;

/**
 * Doctrine Context
 */
class DoctrineContext extends Context
{
    /**
     * @var QueryBuilder
     */
    protected $qb;

    /**
     * @var array
     */
    protected $joins = [];

    /**
     * @var integer
     */
    protected $paramCount = 0;

    /**
     * Constructor
     *
     * @param QueryBuilder $qb
     */
    public function __construct(QueryBuilder $qb)
    {
        $this->qb = $qb;
    }

    /**
     * @param Condition $condition
     *
     * @return boolean
     */
    public function evaluate(Condition $condition)
    {
        $operator = $condition->getOperator();
        $operator->setContext($this);

        return $operator->evaluate('a.'.$condition->getLeft(), $condition->getRight());
    }

    /**
     * @param QueryBuilder $qb
     * @return $this
     */
    public function setQueryBuilder(QueryBuilder $qb)
    {
        $this->qb = $qb;

        return $this;
    }

    /**
     * Get the querybuilder
     *
     * @return QueryBuilder
     */
    public function getQueryBuilder()
    {
        return $this->qb;
    }

    /**
     * Inner join
     *
     * @param  string $join
     * @param  string $alias
     *
     * @return DoctrineContext
     */
    public function innerJoin($join, $alias)
    {
        if (!in_array($alias, $this->joins)) {
            $this->qb->innerJoin($join, $alias);
            array_push($this->joins, $alias);
        }

        return $this;
    }

    /**
     * Get the query result
     *
     * @param integer $limit
     * @param string $orderBy
     * @param string $direction
     *
     * @return ArrayCollection
     */
    public function getQueryResults($limit = null, $orderBy = 'createdAt', $direction = 'ASC')
    {
        if (isset($limit)) {
            $this->qb->setMaxResults($limit);
        }
        
        if (!$this->qb->getDQLPart('orderBy')) {
            $this->qb->orderBy('a.'.$orderBy, $direction);
        }

        return $this->qb->getQuery()->getResult();
    }

    /**
     * Generate a new parameter to avoid query collisions
     *
     * @return string
     */
    public function generateParameter()
    {
        $this->paramCount++;

        return 'param' . $this->paramCount;
    }
}
