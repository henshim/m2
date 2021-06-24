<?php
namespace App\Model;
use PDO;
use PDOException;

class Database
{
    protected $dsn;
    protected $name;
    protected $pass;

    public function __construct()
    {
        $this->dsn = 'mysql:host=localhost;dbname=excercise';
        $this->name = 'admin';
        $this->pass = '123456';
    }

    function connect()
    {
        try {
            return new PDO($this->dsn, $this->name, $this->pass);
        } catch (PDOException $PDOException) {
            echo $PDOException->getMessage();
            die();
        }
    }
}