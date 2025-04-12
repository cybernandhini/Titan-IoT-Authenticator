<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'employee') {
    header("Location: login.php");
    exit();
}
?>
<h2>Welcome, <?php echo $_SESSION['email']; ?> (Employee)</h2>
<p>Admin Dashboard: View user activity, manage access rights, and oversee IoT deployment.</p>
<a href="logout.php">Logout</a>
