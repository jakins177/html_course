<?php
session_start();

header('Content-Type: application/json');

// --- Debug Logging Setup ---
$log_file = __DIR__ . '/../../gasergy_debug.log'; // Log file in project root
$log_prefix = '[' . date('Y-m-d H:i:s') . ' decrease_gasergy] ';

function write_log($message) {
    global $log_file, $log_prefix;
    $formatted_message = is_string($message) ? $message : print_r($message, true);
    file_put_contents($log_file, $log_prefix . $formatted_message . "\n", FILE_APPEND);
}

write_log('--- Script Start ---');
write_log('POST data: ' . print_r($_POST, true));
write_log('SESSION data: ' . print_r($_SESSION, true));

// --- User Authentication Check ---
if (!isset($_SESSION['user_id'])) {
    write_log('Error: User not logged in.');
    echo json_encode(["success" => false, "message" => "User not logged in"]);
    exit;
}
$user_id = $_SESSION['user_id'];
write_log('User ID: ' . $user_id);

// --- Database Connection and Operations ---
try {
    write_log('Requiring db.php...');
    require_once '../auth-system/config/db.php'; // This should make $pdo available
    write_log('db.php included.');

    if (!isset($pdo) || !$pdo instanceof PDO) {
        write_log('Error: $pdo object is not available or not a PDO instance after including db.php.');
        echo json_encode(["success" => false, "message" => "Database connection configuration error."]);
        exit;
    }
    write_log('$pdo object is available.');

    $amount = isset($_POST['amount']) ? (int)$_POST['amount'] : 30;
    write_log('Amount to decrease: ' . $amount);

    // Decrease gasergy_balance
    $sql_update = "UPDATE users SET gasergy_balance = gasergy_balance - :amount WHERE id = :user_id";
    write_log('Preparing update SQL: ' . $sql_update);
    $stmt_update = $pdo->prepare($sql_update);

    write_log('Executing update statement with amount=' . $amount . ', user_id=' . $user_id);
    $update_success = $stmt_update->execute([':amount' => $amount, ':user_id' => $user_id]);

    if ($update_success) {
        write_log('Update statement executed successfully. Rows affected: ' . $stmt_update->rowCount());

        // Fetch the new balance
        $sql_select = "SELECT gasergy_balance FROM users WHERE id = :user_id";
        write_log('Preparing select SQL: ' . $sql_select);
        $stmt_select = $pdo->prepare($sql_select);

        write_log('Executing select statement with user_id=' . $user_id);
        $stmt_select->execute([':user_id' => $user_id]);
        $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            write_log('New balance fetched: ' . $row['gasergy_balance']);
            echo json_encode(["success" => true, "new_balance" => $row['gasergy_balance']]);
        } else {
            write_log('Error: Failed to fetch new balance for user_id=' . $user_id . ' after update.');
            echo json_encode(["success" => false, "message" => "Failed to fetch new balance"]);
        }
        $stmt_select->closeCursor(); // Good practice for PDO select
    } else {
        $errorInfo = $stmt_update->errorInfo();
        write_log('Error: Failed to execute update statement. Error: ' . print_r($errorInfo, true));
        echo json_encode(["success" => false, "message" => "Failed to update balance: " . (isset($errorInfo[2]) ? $errorInfo[2] : 'Unknown database error')]);
    }
    // $stmt_update->closeCursor(); // Not strictly necessary for update, but doesn't hurt

} catch (PDOException $e) {
    write_log('PDOException caught: ' . $e->getMessage() . ' (Code: ' . $e->getCode() . ')');
    echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
} catch (Exception $e) {
    write_log('General Exception caught: ' . $e->getMessage() . ' (Code: ' . $e->getCode() . ')');
    echo json_encode(["success" => false, "message" => "An unexpected error occurred: " . $e->getMessage()]);
}

write_log('--- Script End ---');
?>
