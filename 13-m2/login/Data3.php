<?php

include_once "User.php";
class Data3
{
    public static $files = 'users.json';

    public static function load()
    {
        $dataJson = file_get_contents(self::$path);
        $data = json_decode($dataJson);
        return self::convert($data);
    }

    public static function save($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path, $dataJson);
    }

    public static function convert($data)
    {
        $users = [];
        foreach ($data as $item) {
            $user = new User($item->name, $item->password);
            array_push($users, $user);
        }
        return $users;
    }

    public static function checkLogin($user)
    {
        $users = self::loadData();
        foreach ($users as $item) {
            if ($user->name == $item->name && $user->password == $item->password) {
                return true;
            }
        }
        return false;
    }

    public static function login($name, $password)
    {
        $users = new User($name, $password);
        if (self::checkLogin($users)) {
            session_start();
            $_SESSION['name'] = $name;
            header("Location: index.php");
        } else {
            echo 'wrong user';
        }
    }

    public static function add($user)
    {
        $users = self::loadData();
        array_push($users, $user);
        self::saveData($users);
    }

    public static function get($id)
    {
        $users = self::loadData();
        foreach ($users as $user) {
            if ($user->getId() == $id) {
                return $user;
            }
        }
    }

    public static function edit($id, $newUser)
    {
        $users = self::loadData();
        foreach ($users as $user) {
            if ($user->getId() == $id) {
                $user->setName($newUser->getName());
                $user->setPassword($newUser->getPassword());
            }
        }
        self::saveData($users);
    }
}