<?php
include 'conn.php';
if(isset($_SESSION["username"])){
    $checkValidLogin = $userController->checkValidLogin(session_id(),$_SESSION["username"]);
    if($checkValidLogin["session_id"]!=session_id()){
        session_destroy();
        header("Location: /oneLogin");
    } 
    }
    ?>