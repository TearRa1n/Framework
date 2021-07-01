<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define("ROOT", dirname(__DIR__)); // полный путь

require_once(ROOT . '/vendor/autoload.php');

use app\database\PDOConnection;
use app\models\User;
//use app\models\gateway\UserTableGateway;
//use app\models\Shop;
//use app\models\gateway\ShopTableGateway;

function dd($value){
    var_dump($value);
    die();
}

$connection = PDOConnection::getInstance();

$user = new User('qwe', 'ewq', 'ewe');

$users = User::find()
    ->where('id', '>=', '5')
    ->orderBy('id', 'DESC')
    ->getArrayResult();

$user->login;

//var_dump($users);

//$user = User::find()
//    ->where('login', '=', $login)
//    ->first();
//
//$users = User::find()
//    ->where('post_count', '>', 100)
//    ->all();



//$model->find([]);
//
//if($r = 25){
//    $model->where([]);
//}
//if($limit){
//    $model->limit($limit);
//}

