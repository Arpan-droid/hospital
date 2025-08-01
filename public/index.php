<?php
// Ensure sessions folder is writable
$sessionPath = __DIR__ . '/../sessions';
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0777, true);
}
session_save_path($sessionPath);

// Start session if not active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config
if (file_exists(__DIR__ . '/../config/config.php')) {
    require_once __DIR__ . '/../config/config.php';
}

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        require_once __DIR__ . '/../controllers/AuthController.php';
        break;

    case 'logout':
        // Log out and redirect
        session_destroy();
        header('Location: /');
        break;

    default:
        require_once __DIR__ . '/../views/home.php';
        break;
}
?>
