<?php
session_start();
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND role = 'employee'");
  $stmt->execute([$email]);
  $emp = $stmt->fetch();

  if ($emp && password_verify($password, $emp['password'])) {
    $_SESSION['user'] = $emp;
    header("Location: dashboards/employee.php");
  } else {
    echo "Login failed or not an employee.";
  }
}
?>
<form method="post">
  <input type="email" name="email" required>
  <input type="password" name="password" required>
  <button type="submit">Employee Login</button>
</form>
