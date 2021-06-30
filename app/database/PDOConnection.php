<?php

namespace app\database;

use Dotenv\Dotenv;
use PDO;
use PDOException;
use PDOStatement;

class PDOConnection implements \ConnectionDatabaseInterface
{
    private PDO $pdo;

    private int $queryCount = 0;

    private array $queryTime = [];
    //const DEFAULT_PARAMS_PATH = '/config/env.php';

    private static $instance;

    private function __construct()
    {

    }

    /**
     * @return PDOConnection
     */
    public static function getInstance()
    {
        // если нет созданного обьекта коннекшена
        if (!self::$instance) {

            $dotenv = Dotenv::createImmutable(ROOT);
            $env = $dotenv->safeLoad();
            //$dotenv->required(['DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD', 'DB_HOST'])->notEmpty();

            $dsn = "mysql:dbname={$env['DB_DATABASE']};host={$env['DB_HOST']}";

            try {
                $obj = new self();
                $obj->pdo = new PDO($dsn, $env['DB_USERNAME'], $env['DB_PASSWORD']);
                self::$instance = $obj;
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
        }

        return self::$instance;
    }

    public function prepare(string $q): PDOStatement
    {
        $this->queryCount++;
        $stmt = $this->pdo->prepare($q);
        return $stmt;
    }

    public function query(string $q): PDOStatement
    {
        $this->queryCount++;
        $stmt = $this->pdo->query($q);
        return $stmt;
    }

    public function execute(PDOStatement $stmt, array $data = [])
    {
        $preTime = microtime(true);
        if(count($data)) {
            $isSuccess = $stmt->execute($data);
        } else {
            $isSuccess = $stmt->execute();
        }
        $queryTime = microtime(true) - $preTime;
        //var_dump($queryTime);
        $this->queryTime[] = [$stmt->queryString, $queryTime];
        return $isSuccess ? $stmt : false;
    }

    public function getTimeQueries()
    {
        return $this->queryTime;
    }

}