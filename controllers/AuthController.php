<?php
require_once __DIR__ . '/../models/Hospital.php';
require_once __DIR__ . '/../models/Doctor.php';
require_once __DIR__ . '/../helpers/session.php';
require_once __DIR__ . '/../helpers/validators.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $role = $_POST['role'];

    if ($role == 'admin') {
        $hospital = new Hospital();
        $result = $hospital->login($email, $password);

        if ($result) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['role'] = 'admin';
            header("Location: ../views/admin/dashboard.php");
            exit;
        }
    } else if ($role == 'doctor') {
        $doctor = new Doctor();
        $result = $doctor->login($email, $password);

        if ($result) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['role'] = 'doctor';
            header("Location: ../views/doctor/dashboard.php");
            exit;
        }
    }
    header("Location: ../public/index.php?error=Invalid credentials");
    exit;
}
