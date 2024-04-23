<?php
session_start();
include('../conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = $userController->addUser($username,$password);
    if ($result) {
        $_SESSION['success_message'] =array(
            'message'=> 'Sign up successful. Please Login.',
            'timeout' => time() + 3 
        );
        header("Location: /oneLogin");
    $stmt->close();
}
}
$conn->close();

?>