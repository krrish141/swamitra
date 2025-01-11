<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// If you want to delete the session cookie, you can do so by setting the cookie expiration time in the past
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit;
?>
