<?php


namespace app\models;
use app\database\PDOConnection;

abstract class Model
{
    private PDOConnection $connection;
    private $sql = '';

    public function __construct()
    {
        $this->connection = PDOConnection::getInstance();
    }

    public function findAll(): self
    {
        $this->sql = $this->sql . 'SELECT * FROM ' . $this::TABLE_NAME;

        return $this;
    }

    public function where($field, $operator, $value): self
    {
        $this->sql = $this->sql .  " WHERE {$field} {$operator} '{$value}'";

        return $this;
    }

    public function orderBy(): self
    {
        return $this;
    }

    public function getArrayResult(): array
    {
//        var_dump($this->sql);
//        die;
        $stmt = $this->connection->query($this->sql);
        $stmt = $this->connection->execute($stmt);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }


}