<?php
// chatkit_session.php
header('Content-Type: application/json');

// --- Load environment variables from .env file ---
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $env = parse_ini_file($envFile);
    foreach ($env as $key => $value) {
        putenv("$key=$value");
    }
}

// --- Read from environment ---
// Note: OPENAI_API_KEY is the server-side credential used to request a short-lived
// client secret from the ChatKit API. The client secret returned by the API is
// what the browser consumes; it is not the same value as the API key stored here.
$apiKey = getenv("OPENAI_API_KEY");
$workflowId = getenv("WORKFLOW_ID");

error_log('[TEST] chatkit_session.php invoked');
error_log('[TEST] Workflow ID loaded: ' . ($workflowId ?: 'missing'));

// --- Generate a unique user ID and start session ---
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    session_set_cookie_params([
        'lifetime' => 60 * 60 * 24 * 30, // 30 days
        'path' => '/',
        'secure' => true,
        'httponly' => true,
        'samesite' => 'None'
    ]);
} else {
    session_set_cookie_params([
        'lifetime' => 60 * 60 * 24 * 30, // 30 days
        'path' => '/',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
}
session_start();
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
} else {
    $userId = "user_" . uniqid();
    $_SESSION['user_id'] = $userId;
}
error_log('[TEST] User ID: ' . $userId);

// --- Validate ---
if (!$apiKey || !$workflowId) {
    http_response_code(500);
    echo json_encode(["error" => "Missing OPENAI_API_KEY or WORKFLOW_ID in .env"]);
    exit;
}

// --- Create ChatKit session ---
$data = [
    "workflow" => [ "id" => $workflowId ],
    "user" => $userId,
];

error_log('[TEST] Payload: ' . json_encode($data));

$ch = curl_init("https://api.openai.com/v1/chatkit/sessions");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer $apiKey",
        "Content-Type: application/json",
        "OpenAI-Beta: chatkit_beta=v1"
    ],
    CURLOPT_POSTFIELDS => json_encode($data)
]);

$response = curl_exec($ch);
error_log('[TEST] cURL response: ' . $response);
if (curl_errno($ch)) {
    http_response_code(500);
    echo json_encode(["error" => curl_error($ch)]);
    exit;
}
curl_close($ch);

echo $response;
