<?php
session_start();
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];

        file_put_contents("logs/access.log", date('Y-m-d H:i:s') . " LOGIN SUCCESS - {$email}\n", FILE_APPEND);

        if ($user['role'] === 'employee') {
            header("Location: dashboard_employee.php");
        } else {
            header("Location: dashboard_user.php");
        }
        exit();
    } else {
        echo "Login failed. <a href='index.php'>Try again</a>";
        file_put_contents("logs/access.log", date('Y-m-d H:i:s') . " LOGIN FAIL - {$email}\n", FILE_APPEND);
    }
}
?>

<!-- HTML Login Form -->
<form method="post">
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <input type="submit" value="Login">
</form>
