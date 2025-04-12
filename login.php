<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Titan IoT Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login_process.php">
        <input type="email" name="email" placeholder="Email" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
