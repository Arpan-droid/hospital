<?php
require_once __DIR__ . '/../models/Patient.php';
require_once __DIR__ . '/../models/Doctor.php';

$patientModel = new Patient($pdo);
$doctorModel = new Doctor($pdo);

$doctors = $doctorModel->all();

// Handle Add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $patientModel->add($_POST['doctor_id'], $_POST['name'], $_POST['age']);
    header("Location: ?page=patients");
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $patientModel->delete($_GET['delete']);
    header("Location: ?page=patients");
    exit;
}

$patients = $patientModel->all();
require_once __DIR__ . '/../views/patients.php';
?>
