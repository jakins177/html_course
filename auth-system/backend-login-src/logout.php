<?php
session_start();
session_unset();  // Clear all session variables
session_destroy(); // Destroy the session

// Optional: clear session cookie
if (ini_get("session.use_cookies")) {
    setcookie(session_name(), '', time() - 42000, '/');
}

header('Location: ../login.html');
exit;
