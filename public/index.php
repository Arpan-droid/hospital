<?php
// Session fix: create writable session directory
$sessionPath = __DIR__ . '/../sessions';
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0777, true);
}
session_save_path($sessionPath);

// Start session safely
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config & autoload
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

// Example: basic routing (adjust based on your project)
if (isset($_GET['page']) && $_GET['page'] === 'login') {
    require_once __DIR__ . '/../controllers/AuthController.php';
} else {
    require_once __DIR__ . '/../views/home.php';
}
?>
