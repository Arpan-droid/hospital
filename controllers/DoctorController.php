<?php
require_once __DIR__ . '/../models/Doctor.php';
require_once __DIR__ . '/../models/Hospital.php';

$doctorModel = new Doctor($pdo);
$hospitalModel = new Hospital($pdo);

$hospitals = $hospitalModel->all();

// Handle Add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $doctorModel->add($_POST['hospital_id'], $_POST['name'], $_POST['specialty']);
    header("Location: ?page=doctors");
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $doctorModel->delete($_GET['delete']);
    header("Location: ?page=doctors");
    exit;
}

$doctors = $doctorModel->all();
require_once __DIR__ . '/../views/doctors.php';
?>
