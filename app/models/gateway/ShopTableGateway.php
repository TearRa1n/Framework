<?php

namespace app\models\gateway;


use app\database\PDOConnection;
use app\models\Shop;
use PDO;

class ShopTableGateway
{
    private PDOConnection $connection;

    public function __construct(PDOConnection $connection)
    {
        $this->connection = $connection;
    }

    public function findById(int $id): Shop
    {
//        $data = [
//            'id' => $id
//        ];
        $stmt = $this->connection->query("SELECT * FROM shop WHERE id = {$id}");
        $stmt = $this->connection->execute($stmt);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $shop = new Shop($result['name'], $result['address'], $result['rating']);
        $shop->setId($result['id']);

        return $shop;
    }


}