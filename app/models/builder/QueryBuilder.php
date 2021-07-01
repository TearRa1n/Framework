<?php

namespace app\models\builder;

use app\database\PDOConnection;
use app\models\Model;

class QueryBuilder
{
    private PDOConnection $connection;
    private string $sql = '';

    public function __construct(string $sql)
    {
        $this->connection = PDOConnection::getInstance();
        $this->sql = $sql;
    }

    public function where($field, $operator, $value): self
    {
        $this->sql = $this->sql . " WHERE {$field} {$operator} '{$value}'";

        return $this;
    }

    public function orderBy(string $field, $params = 'ASC'): self
    {
        $this->sql = $this->sql . " ORDER BY {$field} {$params}";

        return $this;
    }

    public function limit(int $first_limit, int $last_limit = null): self
    {
        $this->sql = $this->sql . " LIMIT {$first_limit}, {$last_limit}";

        return $this;
    }

    public function getArrayResult(): array
    {
        $stmt = $this->connection->query($this->sql);
        $stmt = $this->connection->execute($stmt);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
}