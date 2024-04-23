<?php
$max_idle_time = 300; // 30 minutes

if (isset($_SESSION['username'])) {
    if (isset($_SESSION['last_activity'])) {
        if (time() - $_SESSION['last_activity'] > $max_idle_time) {
            session_unset();     
            session_destroy();   
            header("Location: userlogout.php"); 
            exit();
        }
    }

    $_SESSION['last_activity'] = time();
} else {
    header("Location: /oneLogin");
    exit();
}

?>
