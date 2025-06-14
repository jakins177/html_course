<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

require_once __DIR__ . '/../auth-system/config/db.php';

try {
    $stmt = $pdo->prepare("SELECT gasergy_balance FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $balance = $stmt->fetchColumn();
    if ($balance === false) {
        throw new Exception('User not found');
    }

    echo json_encode(['balance' => (int)$balance]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
}
