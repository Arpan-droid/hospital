<?php
require_once __DIR__ . '/../models/Hospital.php';

$hospitalModel = new Hospital($pdo);

// Handle Add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])) {
    $hospitalModel->add($_POST['name'], $_POST['location']);
    header("Location: ?page=hospitals");
    exit;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $hospitalModel->delete($_GET['delete']);
    header("Location: ?page=hospitals");
    exit;
}

$hospitals = $hospitalModel->all();
require_once __DIR__ . '/../views/hospitals.php';
?>
