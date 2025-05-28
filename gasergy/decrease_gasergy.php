<?php
session_start();

header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => false, "message" => "User not logged in"]);
    exit;
}

require_once '../auth-system/config/db.php'; // Corrected path based on ls output

$amount = isset($_POST['amount']) ? (int)$_POST['amount'] : 30;
$user_id = $_SESSION['user_id'];

$conn = getDBConnection(); // Assumes db.php provides this function or $conn variable

if (!$conn) {
    echo json_encode(["success" => false, "message" => "Database connection failed"]);
    exit;
}

// Decrease gasergy_balance
$sql_update = "UPDATE users SET gasergy_balance = gasergy_balance - ? WHERE id = ?";
$stmt_update = $conn->prepare($sql_update);

if (!$stmt_update) {
    echo json_encode(["success" => false, "message" => "Failed to prepare update statement: " . $conn->error]);
    $conn->close();
    exit;
}

$stmt_update->bind_param("ii", $amount, $user_id);

if ($stmt_update->execute()) {
    // Fetch the new balance
    $sql_select = "SELECT gasergy_balance FROM users WHERE id = ?";
    $stmt_select = $conn->prepare($sql_select);

    if (!$stmt_select) {
        echo json_encode(["success" => false, "message" => "Failed to prepare select statement: " . $conn->error]);
        $stmt_update->close();
        $conn->close();
        exit;
    }

    $stmt_select->bind_param("i", $user_id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode(["success" => true, "new_balance" => $row['gasergy_balance']]);
    } else {
        // This case should ideally not happen if the user exists and update was successful
        echo json_encode(["success" => false, "message" => "Failed to fetch new balance"]);
    }
    $stmt_select->close();
} else {
    echo json_encode(["success" => false, "message" => "Failed to update balance: " . $stmt_update->error]);
}

$stmt_update->close();
$conn->close();
?>
