<?php

namespace app\models;

class User extends Model
{
    const TABLE_NAME = 'user';
    //TODO ???
    private ?int $id = null;
    private string $login;
    private string $password;
    private ?string $firstName = null;
    private ?string $middleName = null;
    private ?string $lastName = null;

    private array $fillable = [
        'firstName',
        'middleName',
        'lastName'
    ];

    public function __construct($login,
                                $password,
                                $firstName = null,
                                $middleName = null,
                                $lastName = null)
    {
//        $id = null
//        $this->setId($id);
        $this->setLogin($login);
        $this->setPassword($password);
        $this->setFirstName($firstName);
        $this->setMiddleName($middleName);
        $this->setLastName($lastName);

        parent::__construct();
    }

    public function table()
    {
        return self::TABLE_NAME;
    }

    public function __get(string $name)
    {
        if(!in_array($name, $this->fillable)) {
            $trace = debug_backtrace();
            trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE);
            return null;
        }

        $method = 'get' . mb_strtoupper($name);
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        return $this->$name;
    }

    function __set($name, $value)
    {
        $method = 'set' . mb_strtoupper($name);
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
        $this->$name = $value;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login) : void
    {
        $this->login = $login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getFirstName() : ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstname = null): void
    {
        $this->firstName = $firstname;
    }

    public function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middlename = null): void
    {
        $this->middleName = $middlename;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastname = null): void
    {
        $this->lastName = $lastname;
    }


}
