<?php
// Sessions directory setup
$sessionPath = __DIR__ . '/../sessions';
if (!is_dir($sessionPath)) {
    mkdir($sessionPath, 0777, true);
}
session_save_path($sessionPath);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load config if exists
if (file_exists(__DIR__ . '/../config/config.php')) {
    require_once __DIR__ . '/../config/config.php';
}

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'login':
        require_once __DIR__ . '/../controllers/AuthController.php';
        break;

    case 'logout':
        session_destroy();
        header('Location: /');
        break;

    case 'hospitals':
        require_once __DIR__ . '/../views/hospitals.php';
        break;

    case 'doctors':
        require_once __DIR__ . '/../views/doctors.php';
        break;

    case 'patients':
        require_once __DIR__ . '/../views/patients.php';
        break;

    default:
        require_once __DIR__ . '/../views/home.php';
        break;
}
?>
