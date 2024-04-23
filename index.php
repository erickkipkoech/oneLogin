<?php
try {
    session_start();
    include 'conn.php';
    // Routing
    if(isset($_SESSION["username"]))
    {    
        header('Location: /oneLogin/Views/userdashboard.php');
    }else
    {
        include 'Views/userlogin.php';
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
