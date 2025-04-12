<?php
require 'config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $hashedPassword = password_hash($password, PASSWORD_ARGON2ID);
    $stmt = $pdo->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
    $stmt->execute([$email, $hashedPassword, $role]);

    echo "Registration successful. <a href='index.php'>Login here</a>";
}
?>

<!-- HTML Form for Registration (add Bootstrap later) -->
<form method="post">
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <select name="role">
    <option value="user">User</option>
    <option value="employee">Employee</option>
  </select><br>
  <input type="submit" value="Register">
</form>
