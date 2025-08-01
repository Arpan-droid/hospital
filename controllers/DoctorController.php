<?php
require_once __DIR__ . '/../helpers/sessions.php';
require_once __DIR__ . '/../helpers/validators.php';
require_once __DIR__ . '/../models/Prescription.php';

checkLogin('doctor');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'prescribe') {
    $ticket_id = intval($_POST['ticket_id']);
    $diagnosis = sanitize($_POST['diagnosis']);
    $checkups = sanitize($_POST['checkups']);
    $medicines = sanitize($_POST['medicines']);
    $email = sanitize($_POST['email']);

    $prescription = new Prescription();
    if ($prescription->create($ticket_id, $diagnosis, $checkups, $medicines, $email)) {
        header("Location: ../views/doctor/dashboard.php?success=Prescription sent");
    } else {
        header("Location: ../views/doctor/dashboard.php?error=Failed to send prescription");
    }
    exit;
}
