<?php
session_start();

$_SESSION = array();

session_destroy();
$_SESSION['success_message'] =array(
    'message'=> 'Logged out successfully '.$username,
    'timeout' => time() + 3 
);
header("Location: /oneLogin");
exit();
?>
