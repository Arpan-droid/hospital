<?php
require_once __DIR__ . '/../models/Ticket.php';
require_once __DIR__ . '/../helpers/sessions.php';
require_once __DIR__ . '/../helpers/validators.php';

checkLogin('admin');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'createTicket') {
    $patient_name = sanitize($_POST['patient_name']);
    $patient_email = sanitize($_POST['patient_email']);
    $patient_phone = sanitize($_POST['patient_phone']);
    $problem = sanitize($_POST['problem']);
    $doctor_id = intval($_POST['doctor_id']);

    $ticket = new Ticket();
    if ($ticket->create($patient_name, $patient_email, $patient_phone, $problem, $doctor_id)) {
        header("Location: ../views/admin/tickets.php?success=Ticket issued");
    } else {
        header("Location: ../views/admin/tickets.php?error=Failed to issue ticket");
    }
    exit;
}

// Real-time refresh for doctors
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['doctor_id'])) {
    $doctor_id = intval($_GET['doctor_id']);
    $ticket = new Ticket();
    $result = $ticket->getByDoctor($doctor_id);

    while ($row = pg_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['patient_name']}</td>
            <td>{$row['patient_email']}</td>
            <td>{$row['patient_phone']}</td>
            <td>{$row['problem']}</td>
            <td>
                <button class='btn btn-sm btn-success' onclick='showPrescription({$row['id']}, \"{$row['patient_email']}\")'>Prescribe</button>
            </td>
        </tr>";
    }
}
