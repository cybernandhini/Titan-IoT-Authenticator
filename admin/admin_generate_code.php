<?php
session_start();
require 'config/db.php';
if ($_SESSION['user']['role'] !== 'admin') exit('Not authorized');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $role = $_POST['role'];
  $code = substr(md5(rand()), 0, 8);

  $stmt = $pdo->prepare("INSERT INTO access_codes (email, code, role, expires_at) VALUES (?, ?, ?, DATE_ADD(NOW(), INTERVAL 1 DAY))");
  $stmt->execute([$email, $code, $role]);

  echo "Access code for $email: $code (role: $role)";
}
?>
<form method="post">
  <input type="email" name="email" required placeholder="User Email">
  <select name="role">
    <option value="user">User</option>
    <option value="employee">Employee</option>
  </select>
  <button type="submit">Generate Code</button>
</form>
