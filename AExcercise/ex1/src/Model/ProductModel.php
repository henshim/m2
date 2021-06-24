<?php

namespace App\Model;

use App\Model\Database;
use PDO;

class ProductModel
{
    public $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    function getAll()
    {
        $sql = 'select * from product.json';
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $products = [];

        foreach ($result as $item) {
            $product = new Product($item);
            $product->setId($item['id']);
            $products[] = $product;
        }
        return $products;
    }

    function get($id)
    {
        $sql = 'select * from product.json where id =?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);


    }

    function add($product)
    {
        $sql = 'insert into product.json(name,price) values(?,?)';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $product->name);
        $stmt->bindParam(2, $product->price);
        return $stmt->execute();
    }

    function update($id, $product)
    {
        $sql = 'update product.json set name=?,price=? where id=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $product->name);
        $stmt->bindParam(2, $product->price);
        $stmt->bindParam(3, $id);
        return $stmt->execute();
    }

    function delete($id)
    {
        $sql = 'delete from product.json where id=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    function search($search)
    {
        $sql = "select * from product.json where name like '$search%'";
        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll();
    }
}