<?php

namespace Wetalk\SwooleDatabase\Adapter\Connectors;


use Illuminate\Database\Events\StatementPrepared;
use Wetalk\SwooleDatabase\Adapter\QueryBuilder;
/**
 * Mysql 连接适配器
 * Class MySqlConnection
 * @package Wetalk\SwooleDatabase\Adapter\Connectors
 */
class MySqlConnection extends \Illuminate\Database\MySqlConnection
{
    /**
     * Configure the PDO prepared statement.
     *
     * @param \PDOStatement $statement
     * @return \PDOStatement
     */
    protected function prepared($statement)
    {
        $statement->setFetchMode($this->fetchMode);

        $this->event(new StatementPrepared(
            $this, $statement
        ));

        return $statement;
    }

    /**
     * 查询构造器
     * @return QueryBuilder
     */
    public function query()
    {
        return new QueryBuilder(
            $this, $this->getQueryGrammar(), $this->getPostProcessor()
        );
    }
}