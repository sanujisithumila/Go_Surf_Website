<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

header("Location: admin_login.php");
exit();
?>