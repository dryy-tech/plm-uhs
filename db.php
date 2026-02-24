<?php
// ============================================================
// UHS - Database Connection
// File: includes/db.php
// ============================================================

require_once __DIR__ . '/env.php';




$host    = getenv('DB_HOST')    ?: 'localhost';
$user    = getenv('DB_USER')    ?: 'root';
$pass    = getenv('DB_PASS')    ?: '';
$name    = getenv('DB_NAME')    ?: 'plm_uhs_db';
$charset = getenv('DB_CHARSET') ?: 'utf8mb4';

$conn = new mysqli($host, $user, $pass, $name);

$conn->set_charset($charset);

if ($conn->connect_error) {
    error_log('DB connection failed: ' . $conn->connect_error);

    if (getenv('APP_DEBUG') === 'true') {
        die('<b>DB Error:</b> ' . $conn->connect_error);
    }

    http_response_code(500);
    die('Unable to connect to the database. Please try again later.');
}