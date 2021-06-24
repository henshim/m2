<?php

namespace App\Controller;

class AuthController
{
    public $userModel;

    public function __construct()
    {
        $this->userModel = new \App\Model\UserModel();
    }

    public function checkInput()
    {
        $result = $this->userModel->get($_REQUEST);

        if ($result !== false) {
            $_SESSION['id'] = $result['id'];
            header('Location: ../../index.php');
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION['id']);
        session_destroy();
        header('Location: index.php');
    }

    public function getById()
    {
        $id = $_SESSION['id'];
        $result = $this->userModel->getByIndex($id);
        $result = $result[0];
        return $result;
    }
}