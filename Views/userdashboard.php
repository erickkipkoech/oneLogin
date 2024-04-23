<?php 
session_start();
include('../checkValidLogin.php');
include('../sessionTimeOut.php');
if(isset($_SESSION["username"]))
{
    if (isset($_SESSION['success_message'])) {
        echo '<div class="success-message" id="success-message">' . $_SESSION['success_message']['message'] . '</div>';
        unset($_SESSION['success_message']);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userlist.css">
    <title>Home</title>
</head>
<body>
    <h1>Welcome <?= $_SESSION["username"]?></h1>
    <h2>THis is user page</h2>
    <form action="userlogout.php">
    <button type="submit">LOGOUT</button>
    </form>
    
</body>
<script src='js/notifications.js'></script>
</html>
        
<?php
}?>