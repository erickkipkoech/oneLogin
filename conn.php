<?php
    $conn = new PDO("mysql:host=localhost;dbname=one_login", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    require_once 'Controllers/UserController.php';

    $userController = new UserController($conn);


?>