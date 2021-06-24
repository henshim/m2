<?php
require_once '../../vendor/autoload.php';

use App\Controller\AuthController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $authController = new AuthController();
    if (!$authController->checkInput()) {
        $error = 'Wrong email and password';
    }
}
?>
<fieldset>
    <legend>Login</legend>
    <form action="" method="post">
        <label for="">User Name</label>
        <input type="text" name="username" placeholder="Enter username"><br>
        <label for="">Password</label>
        <input type="password" placeholder="Enter password"><br>
        <button type="submit">Login</button>
    </form>
</fieldset>
