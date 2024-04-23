
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/userlogin.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="Views/usersession.php" method="post">
    <?php 
    if (isset($_SESSION['error_message'])) {
    echo '<div class="error-message" id="error-message">' . $_SESSION['error_message']['message'] . '</div>';
    unset($_SESSION['error_message']);
    }
    ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="" required>

        <label for="password">Password:</label>
        <div class="password-container">
            <input type="password" id="password" name="password" value="" required>
            <span class="password-toggle" onclick="togglePasswordVisibility()">Show</span>
        </div>

         <div class="button-container">
            <button type="submit">Submit</button>
        </div>
        <div class="button-container">
            <a href="Views/userform.php">Sign Up?</button>
        </div>
    </form>
    
</body>
<script src='js/notifications.js'></script>
<script src='js/script.js'></script>
</html>
