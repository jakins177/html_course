<?php
session_start();

$logFile = __DIR__ . '/decrease_debug.log';
file_put_contents($logFile, date('c') . " decrease_gasergy.php started\n", FILE_APPEND);

if (!isset($_SESSION['user_id'])) {
    file_put_contents($logFile, "No session user_id\n", FILE_APPEND);
    http_response_code(403);
    exit('Unauthorized');
}

require_once __DIR__ . '/../auth-system/config/db.php';

$userId = $_SESSION['user_id'];
$amount = intval($_POST['amount'] ?? 1);

file_put_contents($logFile, "Attempting to decrease gasergy by $amount for user $userId\n", FILE_APPEND);

if ($amount <= 0) {
    file_put_contents($logFile, "Invalid amount\n", FILE_APPEND);
    exit('Invalid amount');
}

try {
    $stmt = $pdo->prepare("UPDATE users SET gasergy_balance = GREATEST(gasergy_balance - ?, 0) WHERE id = ?");
    $stmt->execute([$amount, $userId]);

    $stmt = $pdo->prepare("SELECT gasergy_balance FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    $newBalance = $stmt->fetchColumn();

    file_put_contents($logFile, "Gasergy decreased successfully, new balance: $newBalance\n", FILE_APPEND);
    echo json_encode(['success' => true, 'balance' => $newBalance]);
} catch (Exception $e) {
    file_put_contents($logFile, "Exception: " . $e->getMessage() . "\n", FILE_APPEND);
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
}



?>