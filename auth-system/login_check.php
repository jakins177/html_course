<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Determine the root directory of the application (one level above this file)
$appRoot = dirname(__DIR__);

// Directory of the currently executing script
$scriptDir = dirname($_SERVER['SCRIPT_FILENAME']);

// Compute how many levels deeper the script directory is compared to the root
$depth = 0;
if (strpos($scriptDir, $appRoot) === 0) {
    $relative = trim(substr($scriptDir, strlen($appRoot)), DIRECTORY_SEPARATOR);
    if ($relative !== '') {
        $depth = substr_count($relative, DIRECTORY_SEPARATOR) + 1;
    }
}

// Build the relative path to the login page
$login = str_repeat('../', $depth) . 'auth-system/frt_login.php';

// Redirect unauthenticated users to the login page
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $login);
    exit;
}
?>
