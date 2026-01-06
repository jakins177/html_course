<?php
session_start();
require_once __DIR__ . '/../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password_hash FROM users WHERE email = ? AND provider = 'local'");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password_hash'])) {
        exit('Invalid email or password.');
    }

    $_SESSION['user_id'] = (string)$user['id'];
    header('Location: ../../index.php'); // Change this to your dashboard/home page
    exit;
}
