<?php

namespace app\models;

class Shop extends Model
{
    const MAX_RATING = 10;
    const TABLE_NAME = 'shop';

//TODO id
    private ?int $id = null;
    private string $name;
    private string $address;
    private ?float $rating = null;

    public function __construct(string $name, string $address, float $rating = null)
    {
        $this->setName($name);
        $this->setAddress($address);
        $this->setRating($rating);

        parent::__construct();
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setId(int $id) : void
    {
        $this->id = $id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setName(string $name) : void
    {
        $this->name = $name;
    }

    public function getAddress() : string
    {
        return $this->address;
    }

    public function setAddress(string $address) : void
    {
        $this->address = $address;
    }

    public function getRating() :? float
    {
        return $this->rating;
    }

    public function setRating(?float $rating = null) : void
    {
        if($rating >= self::MAX_RATING){
            $rating = self::MAX_RATING;
        }

        $this->rating = $rating;
    }

}

