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

// Load config & autoload if needed
if (file_exists(__DIR__ . '/../config/config.php')) {
    require_once __DIR__ . '/../config/config.php';
}

// Basic routing (you can expand as needed)
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        if (file_exists(__DIR__ . '/../controllers/AuthController.php')) {
            require_once __DIR__ . '/../controllers/AuthController.php';
        } else {
            echo "<h2>Login controller not found</h2>";
        }
        break;

    default:
        // Load home view
        if (file_exists(__DIR__ . '/../views/home.php')) {
            require_once __DIR__ . '/../views/home.php';
        } else {
            echo "<h2>Home view not found</h2>";
        }
        break;
}
?>
