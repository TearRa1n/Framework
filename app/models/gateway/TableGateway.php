<?php


namespace app\models\gateway;

use PDO;

abstract class TableGateway
{
    public function findById(int $id): object
    {
//        $data = [
//            'id' => $id
//        ];

        $stmt = $this->connection->query("SELECT * FROM shop WHERE id = {$id}");
        $stmt = $this->connection->execute($stmt);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $shop = new Shop($result[''], $result['address'], $result['rating']);
        $shop->setId($result['id']);

        return $shop;
    }

}