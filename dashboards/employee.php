<?php
session_start();
if ($_SESSION['user']['role'] !== 'employee') die('Access denied');
?>
<h2>Welcome Employee</h2>
<p>Monitor SME usage, ticketed IoT data</p>
