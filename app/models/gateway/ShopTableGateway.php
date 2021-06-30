<?php

namespace app\models\gateway;


use app\database\PDOConnection;
use app\models\Shop;
use PDO;

class ShopTableGateway extends TableGateway
{
    const TABLE_NAME = 'shop';

    private PDOConnection $connection;

    /**
     * Объект для работы с БД
     */
    public function __construct(PDOConnection $connection)
    {
        $this->connection = $connection;

    }

//    /**
//     * Получить магазин по id в виде объекта Shop
//     */
//    public function findById(int $id): Shop
//    {
////        $data = [
////            'id' => $id
////        ];
//        $stmt = $this->connection->query("SELECT * FROM shop WHERE id = {$id}");
//        $stmt = $this->connection->execute($stmt);
//
//        $result = $stmt->fetch(PDO::FETCH_ASSOC);
//
//        $shop = new Shop($result[''], $result['address'], $result['rating']);
//        $shop->setId($result['id']);
//
//        return $shop;
//    }


}