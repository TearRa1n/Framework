<?php


namespace app\models;

use app\database\PDOConnection;
use app\models\builder\QueryBuilder;

abstract class Model
{
    private PDOConnection $connection;

    public function __construct()
    {
        $this->connection = PDOConnection::getInstance();
    }

    public function table()
    {
        return null;
    }

    public static function find(): QueryBuilder
    {
        //TODo child table name
//        $sql = 'SELECT * FROM ' . self::TABLE_NAME;
        $sql = 'SELECT * FROM ' . static::table();

        $qb = new QueryBuilder($sql);

        return $qb;
    }
//
//    public function where($field, $operator, $value): self
//    {
//        $this->sql = $this->sql . " WHERE {$field} {$operator} '{$value}'";
//
//        return $this;
//    }
//
//    public function orderBy($field, $params = 'ASC'): self
//    {
//        $this->sql = $this->sql . " ORDER BY {$field} {$params}";
//
//        return $this;
//    }
//
//    public function limit($first_limit, $last_limit = null): self
//    {
//        $this->sql = $this->sql . " LIMIT {$first_limit}, {$last_limit}";
//        return $this;
//    }
//
//    public function getArrayResult(): array
//    {
//        $stmt = $this->connection->query($this->sql);
//        $stmt = $this->connection->execute($stmt);
//        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
//
//        return $result;
//    }


}