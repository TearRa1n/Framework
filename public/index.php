<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

define("ROOT", dirname(__DIR__)); // полный путь
require_once ROOT . '/app/database/ConnectionDatabaseInterface.php';

require_once (ROOT . '/app/database/PDOConnection.php');

require_once (ROOT . '/vendor/autoload.php');

$connection = \app\database\PDOConnection::getInstance();

//$stmt = $connection->query('SELECT * FROM table_name1');
//$connection->execute($stmt);
//$stmt = $connection->query('SELECT * FROM table_name1');
//$connection->execute($stmt);
//$stmt = $connection->query('SELECT * FROM table_name1');
//$connection->execute($stmt);
use app\models\User;
use app\models\gateway\UserTableGateway;

$user = new User('1','weq2', 'ewqeq1');
$table = new UserTableGateway($connection);
$table->addUser($user);

//$user = $table->findById(1);

$shopTableGateway = new \app\models\gateway\ShopTableGateway($connection);
//$shop = new \app\models\Shop();
$shop = $shopTableGateway->findById(2);
var_dump($shop);

