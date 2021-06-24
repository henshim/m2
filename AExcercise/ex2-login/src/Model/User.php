<?php


namespace App\Model;

class User
{
    public $id;
    public $name;
    public $pass;

    public function __construct($data)
    {
        $this->name=$data['username'];
        $this->pass=$data['password'];
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
}