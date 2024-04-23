<?php
$currentDirectory = __DIR__;
require_once $currentDirectory.'/../Models/UserModel.php';

class UserController {
    private $model;

    public function __construct($conn) {
        $this->model = new UserModel($conn);
    }

    public function loginUser($username,$password) {
        return $this->model->loginUser($username,$password);
    }

    public function addUser($username,$password) {
        return $this->model->addUser($username,$password);
    }

    public function logoutFromOtherDevices($session_id, $username, $conn){
        return $this->model->logoutFromOtherDevices($session_id, $username, $conn);
    }
    public function checkValidLogin($session_id,$username){
        return $this->model->checkValidLogin($session_id,$username);
    }

  
}
?>
