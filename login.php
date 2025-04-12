<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Titan IoT - Login</title>
</head>
<body>
    <h2>Login to Titan IoT Authenticator</h2>
    <form method="POST" action="login_process.php">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
