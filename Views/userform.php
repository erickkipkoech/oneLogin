<?php
session_start();
include '../conn.php';

if(isset($_SESSION["username"]))
{
{
    try
    {
        header('Location: /oneLogin');
    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
}
else
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/userform.css">
    <title><?= $title; ?></title>
</head>
<body>
    <h1>Sign Up</h1>

    <form action="usersignup.php" method="post">
        <input type="hidden" name="id" value="">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="" required>

        <label for="password">Password:</label>
        <input type="text" id="password" name="password" value="" required>

        <label for="password">Confirm Password:</label>
        <input type="text" id="confirmPassword" name="confirmPassword" value="" required>
         <div class="button-container">
            <button type="button" class="back-button" onclick="window.location.href='../'">Back</button>
            <button type="submit">Submit</button>
        </div>
        
    </form>
    
</body>
</html>
<?php }?>