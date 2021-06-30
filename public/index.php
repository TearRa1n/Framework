<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

define("ROOT", dirname(__DIR__)); // полный путь

require_once (ROOT . '/vendor/autoload.php');

use app\database\PDOConnection;
use app\models\User;
use app\models\gateway\UserTableGateway;
use app\models\Shop;
use app\models\gateway\ShopTableGateway;

$connection = PDOConnection::getInstance();

//$stmt = $connection->query('SELECT * FROM table_name1');
//$connection->execute($stmt);
//$stmt = $connection->query('SELECT * FROM table_name1');
//$connection->execute($stmt);
//$stmt = $connection->query('SELECT * FROM table_name1');
//$connection->execute($stmt);

//$user = new User('1','weq2', 'ewqeq1');
//$userTableGateway = new UserTableGateway($connection);
//$userTableGateway->addUser($user);

//$user = $table->findById(1);

//$shopTableGateway = new ShopTableGateway($connection);

//$shopTableGateway->findById(1);
////$shop = new \app\models\Shop();
//$shop = $shopTableGateway->findById(2);
//var_dump($shop);

$user = new User('123', 'we123');
$shop = new Shop('eq', '31ewa');

$user = $user->findAll()
    ->where('login', '=', 'weq')
    ->getArrayResult();

//User::findAll()
//    ->getArrayResult();

var_dump($user);
die;
//var_dump($shop);
$user->findAll();
//$user->Where();

die;

$model->find([]);

if($r = 25){
    $model->where([]);
}
if($limit){
    $model->limit($limit);
}

$result = $qb->findAll()
    ->where(['name' => 'ivan'])
    ->orderBy('desc')
    ->limit(50)
    ->getArrayResult();

$res = $model->get();
