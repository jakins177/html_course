<?php
session_start();
require_once __DIR__ . '/../auth-system/config/db.php';

$logFile = __DIR__ . '/add_debug.log';
file_put_contents($logFile, date('c') . " add.php started\n", FILE_APPEND);

// ✅ Check session
if (!isset($_SESSION['user_id'])) {
    file_put_contents($logFile, "Unauthorized access attempt\n", FILE_APPEND);
    http_response_code(403);
    exit('Unauthorized');
}

// ✅ Validate input
$amount = intval($_POST['amount'] ?? 0);
file_put_contents($logFile, "User ID: {$_SESSION['user_id']}, Amount: $amount\n", FILE_APPEND);

if ($amount <= 0) {
    file_put_contents($logFile, "Invalid amount posted\n", FILE_APPEND);
    exit('Invalid amount');
}

// ✅ Try updating the user's gasergy balance
try {
    $stmt = $pdo->prepare("UPDATE users SET gasergy_balance = gasergy_balance + ? WHERE id = ?");
    $stmt->execute([$amount, $_SESSION['user_id']]);
    file_put_contents($logFile, "Gasergy updated successfully\n", FILE_APPEND);
} catch (Exception $e) {
    file_put_contents($logFile, "Exception: " . $e->getMessage() . "\n", FILE_APPEND);
    exit('Server error');
}

// ✅ Redirect back
header('Location: get.php');
exit;
