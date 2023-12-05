<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Clear cookies
setcookie('user_id', '', time() - 3600, '/'); 
// Expire the cookie immediately

// Redirect to the home page after logout
header("Location: ../index.php");
exit();
?>