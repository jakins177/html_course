<?php
// chatkit_session.php
header('Content-Type: application/json');

// --- Load environment variables from .env file ---
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    error_log('[ChatKit] Found .env file.');
    $env = parse_ini_file($envFile);
    foreach ($env as $key => $value) {
        putenv("$key=$value");
    }
} else {
    error_log('[ChatKit] .env file not found at ' . $envFile);
}

// --- Read from environment ---
// Note: OPENAI_API_KEY is the server-side credential used to request a short-lived
// client secret from the ChatKit API. The client secret returned by the API is
// what the browser consumes; it is not the same value as the API key stored here.
$apiKey = getenv("OPENAI_API_KEY");
$workflowId = getenv("WORKFLOW_ID");

error_log('[ChatKit] API Key loaded: ' . ($apiKey ? 'found' : 'missing'));
error_log('[ChatKit] Workflow ID loaded: ' . ($workflowId ? 'found' : 'missing'));

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
    $userId = (string)$_SESSION['user_id'];
} else {
    $userId = "user_" . uniqid();
    $_SESSION['user_id'] = $userId;
}
error_log('[ChatKit] User ID: ' . $userId);

// --- Validate ---
if (!$apiKey || !$workflowId) {
    http_response_code(500);
    $error = "Missing credentials. ";
    if (!$apiKey) $error .= "OPENAI_API_KEY is not set. ";
    if (!$workflowId) $error .= "WORKFLOW_ID is not set. ";
    error_log('[ChatKit] Validation failed: ' . $error);
    echo json_encode(["error" => $error]);
    exit;
}

// --- Create ChatKit session ---
$data = [
    "workflow" => [ "id" => $workflowId ],
    "user" => $userId,
];

error_log('[ChatKit] Payload for OpenAI: ' . json_encode($data));

$ch = curl_init("https://api.openai.com/v1/chatkit/sessions");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: " . ($apiKey ? "Bearer $apiKey" : ""),
        "Content-Type: application/json",
        "OpenAI-Beta: chatkit_beta=v1"
    ],
    CURLOPT_POSTFIELDS => json_encode($data)
]);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
error_log('[ChatKit] OpenAI API response code: ' . $httpcode);
error_log('[ChatKit] OpenAI API response body: ' . $response);

if (curl_errno($ch)) {
    $curl_error = curl_error($ch);
    http_response_code(500);
    error_log('[ChatKit] cURL error: ' . $curl_error);
    echo json_encode(["error" => $curl_error]);
    exit;
}
if ($httpcode >= 400) {
    http_response_code($httpcode);
    $errorDetails = json_decode($response, true);
    $errorMessage = "Failed to create ChatKit session. ";
    if (isset($errorDetails['error']['message'])) {
        $errorMessage .= $errorDetails['error']['message'];
    } else {
        $errorMessage .= "Received status code: " . $httpcode;
    }
    error_log('[ChatKit] Error from OpenAI API: ' . $errorMessage);
    echo json_encode(["error" => $errorMessage]);
} else {
    echo $response;
}

curl_close($ch);
