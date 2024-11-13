<?php

namespace Wetalk\SwooleDatabase\Adapter;
/**
 * 模型基类
 * Class Model
 * @package Wetalk\SwooleDatabase\Adapter
 */
class Model extends \Illuminate\Database\Eloquent\Model
{
    /**
     * Resolve a connection instance.
     *
     * @param string|null $connection
     * @return \Illuminate\Database\Connection
     */
    public static function resolveConnection($connection = null)
    {
        return Manager::connection($connection);
    }

    /**
     * Begin querying the model.
     *
     * @return QueryBuilder
     */
    public static function query()
    {
        return (new static)->newQuery();
    }

    /**
     * Get the database connection for the model.
     *
     * @return \Illuminate\Database\Connection
     */
    public function getConnection()
    {
        return Manager::connection($this->getConnectionName());
    }
}