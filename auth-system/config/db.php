<?php
require_once __DIR__ . '/../../config/env.php';

$host = getenv('DB_HOST') ?: 'localhost';
$db   = 'robot_network';
$user = getenv('DB_USER') ?: 'srn_user';
$pass = getenv('DB_PASS') ?: 'J0j0j0j0!';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
