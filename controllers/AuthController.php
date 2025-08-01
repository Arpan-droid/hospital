<?php
// Start session only if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../models/Hospital.php';
require_once __DIR__ . '/../models/Doctor.php';
require_once __DIR__ . '/../helpers/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Example: login logic (can be adapted for Supabase or DB)
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === 'admin@example.com' && $password === 'password') {
        $_SESSION['user'] = ['email' => $email];
        header('Location: /?page=home');
        exit;
    } else {
        setFlash('error', 'Invalid credentials!');
        header('Location: /?page=login');
        exit;
    }
}

// Load login view if not POST
require_once __DIR__ . '/../views/login.php';
?>
