<?php
session_start();
if ($_SESSION['user']['role'] !== 'user') die('Access denied');
?>
<h2>Welcome User</h2>
<p>IoT access panel: solar/grid/H2 switch</p>
