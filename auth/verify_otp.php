<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if ($_POST['otp'] == $_SESSION['otp'] && time() < $_SESSION['otp_expire']) {
    $role = $_SESSION['user']['role'];
    header("Location: ../dashboards/{$role}.php");
  } else {
    echo "OTP failed or expired.";
  }
}
?>
<form method="post">
  <input name="otp" placeholder="Enter OTP">
  <button type="submit">Verify</button>
</form>
