
<?php

$session_expiry = 20; // 10 minutes
ini_set('session.gc_maxlifetime', $session_expiry);

session_start();
include('../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = $userController->loginUser($username,$password);
    if ($result) {
        $hashed_password = $result["password"];
        $salt = $result["password_salt"];
        if (password_verify($password . $salt, $hashed_password)) {
            $_SESSION["username"] = $username;

            $_SESSION['success_message'] = array(
                'message'=> 'Welcome '.$username,
                'timeout' => time() + 3 

            );
                $logoutOtherUser=$userController->logoutFromOtherDevices(session_id(),$username,$conn);
                header("Location: userdashboard.php");
                
            exit();
        } else {
            $_SESSION['error_message'] =array(
                'message'=> 'Invalid username or password.',
                'timeout' => time() + 3 
            );
            header("Location: /oneLogin");

        }
    } else {
        $_SESSION['error_message'] =array(
            'message'=> 'Invalid username or password.',
            'timeout' => time() + 3 
        );
        header("Location: /oneLogin");

    }

    $stmt->close();
}

$conn->close();


?>