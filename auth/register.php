<?php
require '../config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = password_hash($_POST['password'], PASSWORD_ARGON2ID);
  $access_code = $_POST['access_code'];

  $codeCheck = $pdo->prepare("SELECT * FROM access_codes WHERE code = ? AND used = 0 AND expires_at > NOW()");
  $codeCheck->execute([$access_code]);
  $valid = $codeCheck->fetch();

  if ($valid) {
    $role = $valid['role'];
    $stmt = $pdo->prepare("INSERT INTO users (email, password, phone, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$email, $password, $phone, $role]);

    $pdo->prepare("UPDATE access_codes SET used = 1 WHERE id = ?")->execute([$valid['id']]);
    echo "Registration successful. <a href='login.php'>Login</a>";
  } else {
    echo "Invalid or expired access code.";
  }
}
?>
