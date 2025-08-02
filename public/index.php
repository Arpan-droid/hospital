<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/session.php';
require_once __DIR__ . '/../models/Hospital.php';
require_once __DIR__ . '/../models/Doctor.php';
require_once __DIR__ . '/../models/Patient.php';

$hospitalModel = new Hospital($pdo);
$doctorModel = new Doctor($pdo);
$patientModel = new Patient($pdo);

$page = $_GET['page'] ?? 'home';

if ($page === 'hospitals') {
    if (isset($_POST['add'])) {
        $hospitalModel->create($_POST['name'], $_POST['location']);
    }
    if (isset($_GET['delete'])) {
        $hospitalModel->delete($_GET['delete']);
    }
    $hospitals = $hospitalModel->all();
    include __DIR__ . '/../views/hospitals.php';

} elseif ($page === 'doctors') {
    if (isset($_POST['add'])) {
        $doctorModel->create($_POST['hospital_id'], $_POST['name'], $_POST['specialty']);
    }
    if (isset($_GET['delete'])) {
        $doctorModel->delete($_GET['delete']);
    }
    $doctors = $doctorModel->all();
    $hospitals = $hospitalModel->all();
    include __DIR__ . '/../views/doctors.php';

} elseif ($page === 'patients') {
    if (isset($_POST['add'])) {
        $patientModel->create($_POST['doctor_id'], $_POST['name'], $_POST['age']);
    }
    if (isset($_GET['delete'])) {
        $patientModel->delete($_GET['delete']);
    }
    $patients = $patientModel->all();
    $doctors = $doctorModel->all();
    include __DIR__ . '/../views/patients.php';

} else {
    include __DIR__ . '/../views/home.php';
}
