<?php
require_once __DIR__ . '/../helpers/sessions.php';
require_once __DIR__ . '/../helpers/validators.php';
require_once __DIR__ . '/../models/Doctor.php';
require_once __DIR__ . '/../models/Stock.php';

checkLogin('admin');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'addDoctor') {
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $specialization = sanitize($_POST['specialization']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $hospital_id = $_SESSION['user_id'];

        $doctor = new Doctor();
        if ($doctor->create($name, $email, $specialization, $password, $hospital_id)) {
            header("Location: ../views/admin/doctors.php?success=Doctor added");
        } else {
            header("Location: ../views/admin/doctors.php?error=Failed to add doctor");
        }
        exit;
    }

    if ($action == 'deleteDoctor') {
        $id = intval($_POST['id']);
        $doctor = new Doctor();
        if ($doctor->delete($id)) {
            header("Location: ../views/admin/doctors.php?success=Doctor deleted");
        } else {
            header("Location: ../views/admin/doctors.php?error=Failed to delete doctor");
        }
        exit;
    }

    if ($action == 'addStock') {
        $item_name = sanitize($_POST['item_name']);
        $quantity = intval($_POST['quantity']);
        $hospital_id = $_SESSION['user_id'];

        $stock = new Stock();
        if ($stock->create($item_name, $quantity, $hospital_id)) {
            header("Location: ../views/admin/stock.php?success=Item added");
        } else {
            header("Location: ../views/admin/stock.php?error=Failed to add item");
        }
        exit;
    }

    if ($action == 'deleteStock') {
        $id = intval($_POST['id']);
        $stock = new Stock();
        if ($stock->delete($id)) {
            header("Location: ../views/admin/stock.php?success=Item deleted");
        } else {
            header("Location: ../views/admin/stock.php?error=Failed to delete item");
        }
        exit;
    }
}
