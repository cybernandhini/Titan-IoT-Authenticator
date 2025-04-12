<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
    exit();
}
?>
<h2>Welcome, <?php echo $_SESSION['email']; ?> (User)</h2>
<p>IoT Dashboard Access: View your energy consumption and fallback source (Solar → Grid → H2).</p>
<a href="logout.php">Logout</a>
