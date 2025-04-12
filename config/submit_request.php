<?php
require 'config/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $pdo->prepare("INSERT INTO access_requests (email, phone) VALUES (?, ?)");
  $stmt->execute([$_POST['email'], $_POST['phone']]);
  echo "Request submitted. The SME will review and send you a code.";
}
?>
