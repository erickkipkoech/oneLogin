<?php
class UserModel {
    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function loginUser($username,$password) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function addUser($username,$password) {
        $query = "INSERT INTO users (username,password ,password_salt,isDeletedStatus) 
        VALUES (:username,:password,:password_salt,:isDeletedStatus)";
        $stmt = $this->conn->prepare($query);
        $salt = bin2hex(random_bytes(22));
        $isDeletedStatus = 0;
        $hashed_password = password_hash($password . $salt, PASSWORD_BCRYPT);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':password_salt', $salt);
        $stmt->bindParam(':isDeletedStatus', $isDeletedStatus);

        return $stmt->execute();
    }

        // Function to logout user from all devices except the current one
        public function logoutFromOtherDevices($currentSessionId, $username, $conn) {
        // Invalidate previous sessions for the user except the current one
        $sql = "UPDATE users SET session_id=:currentSessionId WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':currentSessionId', $currentSessionId);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();

}

public function checkValidLogin($session_id,$username) {
    $sql ="SELECT session_id FROM users WHERE username = :username AND session_id=:session_id";
    $stmt=$this->conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':session_id', $session_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);

}

}

?>
