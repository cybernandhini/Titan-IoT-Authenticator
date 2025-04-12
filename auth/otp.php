<?php
require '../config/db.php';
$otp = rand(100000, 999999);
$_SESSION['otp'] = $otp;
$_SESSION['otp_expire'] = time() + 300; // 5 min expiry

// send OTP (Twilio API can replace this echo for real SMS)
echo "Your OTP is: $otp <a href='verify_otp.php'>Enter OTP</a>";
?>
