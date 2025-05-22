<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function log_error($message) {
    file_put_contents(__DIR__ . '/register_error.log', date('Y-m-d H:i:s') . " - $message\n", FILE_APPEND);
}

require_once __DIR__ . '/../config/db.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            log_error("Invalid email format: $email");
            exit('Invalid email format.');
        }

        if (strlen($password) < 6) {
            log_error("Password too short for: $email");
            exit('Password must be at least 6 characters.');
        }

        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->fetch()) {
            log_error("Email already registered: $email");
            exit('Email is already registered.');
        }

        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $pdo->prepare("INSERT INTO users (email, password_hash, provider) VALUES (?, ?, 'local')");
        $stmt->execute([$email, $password_hash]);

        log_error("User registered successfully: $email");
        echo "Registration successful. <a href='../login.html'>Login</a>";
    } else {
        log_error("Invalid request method: " . $_SERVER['REQUEST_METHOD']);
        http_response_code(405);
        exit('Method Not Allowed');
    }
} catch (Exception $e) {
    log_error("Exception: " . $e->getMessage());
    http_response_code(500);
    exit('Server error.');
}
?>