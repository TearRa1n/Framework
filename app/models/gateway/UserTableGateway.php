<?php

namespace app\models\gateway;

use app\database\PDOConnection;
use app\models\User;
use PDO;

class UserTableGateway
{
    private PDOConnection $connection;

    public function __construct(PDOConnection $connection)
    {
        $this->connection = $connection;
    }

    public function findById(int $id): User
    {
        $stmt = $this->connection->query("SELECT * FROM shop WHERE id = {$id}");
        $stmt = $this->connection->execute($stmt);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $user = new User($result['name'], $result['address'], $result['rating']);
        $user->setId($result['id']);

        return $user;
    }

    public function addUser(User $user)
    {
        $data = [
            'login' => $user->getLogin(),
            'password' => $user->getPassword(),
            'first_name' => $user->getFirstName(),
            'middle_name' => $user->getMiddleName(),
            'last_name' => $user->getLastName(),
        ];
        $stmt = $this->connection->prepare("INSERT INTO user (login, password, first_name, middle_name, last_name) VALUES (
                                                                               :login, 
                                                                               :password, 
                                                                               :first_name, 
                                                                               :middle_name, 
                                                                               :last_name
                                                                               )"
        );

        $this->connection->execute($stmt, $data);
    }
}

//$connection = PDOConnection::getInstance();
//
//$user = new User('qwe');
//
//$userTableGateway = new UserTableGateway($connection);
//
//$userTableGateway->addUser($user);