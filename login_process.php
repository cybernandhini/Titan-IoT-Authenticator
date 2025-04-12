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
        if ($user['role'] === 'employee') {
            header("Location: dashboard_employee.php");
        } else {
            header("Location: dashboard_user.php");
        }
        exit();
    } else {
        echo "Login failed. <a href='login.php'>Try again</a>";
    }
}
?>
