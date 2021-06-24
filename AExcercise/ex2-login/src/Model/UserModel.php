<?php


namespace App\Model;


class UserModel
{
    public $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    function getAll()
    {
        $sql = 'select * from users';
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        $users = [];

        foreach ($result as $item) {
            $user = new User($item);
            $user->setId(['id']);
            $users[] = $user;
        }
        return $users;
    }

    function get($request)
    {
        $sql = 'select *from users where username=? and password=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $request['username']);
        $stmt->bindParam(2, $request['password']);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getByIndex($id)
    {
        $sql = 'select * from users where id=?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}