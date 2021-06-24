<?php

namespace App\Model;

class Product
{
    public int $id;
    public string $name;
    public int $price;

    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->price = $data['price'];
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}