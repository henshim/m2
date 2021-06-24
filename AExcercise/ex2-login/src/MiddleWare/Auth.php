<?php

namespace App\MiddleWare;

class Auth
{
    public function isLogin()
    {
        if (!isset($_SESSION['id'])) {
            header("Location:View/login.php");
        }
    }
}