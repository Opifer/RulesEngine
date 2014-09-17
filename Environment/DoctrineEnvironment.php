<?php

namespace Opifer\RulesEngine\Environment;

use Opifer\RulesEngine\Operator\DoctrineOperator;

class DoctrineEnvironment extends Environment
{
    /**
     * @var array
     */
    public $joins = [];

    /**
     * @var integer
     */
    public $paramCount = 0;

    /**
     * @var \Doctrine\ORM\QueryBuilder
     */
    public $queryBuilder;

    public function getOperator()
    {
        return new DoctrineOperator();
    }

    public function newParamName()
    {
        $this->paramCount++;

        return 'param' . $this->paramCount;
    }

    public function innerJoin($join, $alias)
    {
        if (!in_array($alias, $this->joins)) {
            $this->queryBuilder->innerJoin($join, $alias);
            array_push($this->joins, $alias);
        }

        return $this;
    }

    public function cloneQueryBuilder()
    {
        $paramContent = $this->newParamName();
        $subQuery = clone $this->queryBuilder;
        $subQuery->resetDQLParts();
        $subQuery->setParameters([]);
        $subQuery->select($paramContent)->from('OpiferCmsBundle:Content', $paramContent);

        return $subQuery;
    }

    /**
     * Get the query result
     *
     * @param integer $limit
     *
     * @return ArrayCollection
     */
    public function getQueryResults($limit = null)
    {
        if (isset($limit)) {
            $this->queryBuilder->setMaxResults($limit);
        }

        return $this->queryBuilder->getQuery()->getResult();
    }
}
