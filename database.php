<?php
// ── MySQL Connection ──────────────────────────────────────────
$DB_CONFIG = [
    'host' => '145.223.17.70',
    'database' => 'u632391467_yaswanth',
    'user' => 'u632391467_yaswanth',
    'password' => 'Yaswanth@2026Cc!',
    'charset' => 'utf8mb4'
];

$dsn = "mysql:host={$DB_CONFIG['host']};dbname={$DB_CONFIG['database']};charset={$DB_CONFIG['charset']}";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $DB_CONFIG['user'], $DB_CONFIG['password'], $options);
} catch (\PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed: " . $e->getMessage()]);
    exit();
}
?>
