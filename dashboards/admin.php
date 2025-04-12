<?php
session_start();
require '../config/db.php';
if ($_SESSION['user']['role'] !== 'admin') die('Access denied');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $code = substr(md5(rand()), 0, 8);
  $role = $_POST['role'];
  $stmt = $pdo->prepare("INSERT INTO access_codes (code, role, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 DAY))");
  $stmt->execute([$code, $role]);
  echo "Access code: $code (valid 24 hours)";
}
?>
<form method="post">
  <select name="role">
    <option value="user">User</option>
    <option value="employee">Employee</option>
  </select>
  <button type="submit">Generate Access Code</button>
</form>
