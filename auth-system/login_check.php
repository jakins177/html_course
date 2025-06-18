<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: /auth-system/frt_login.php');
    exit;
}
?>
