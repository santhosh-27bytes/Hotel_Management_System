<?php
session_start();
session_destroy(); // Clears all admin data
header("Location: login.php"); // Send back to login screen
exit();
?>