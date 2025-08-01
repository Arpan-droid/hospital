<?php
require_once __DIR__ . '/../../helpers/sessions.php';
require_once __DIR__ . '/../../models/Doctor.php';
checkLogin('admin');
include '../partials/header.php';

$doctor = new Doctor();
$doctors = $doctor->getAll($_SESSION['user_id']);
?>

<h2>Issue Tickets</h2>
<a href="dashboard.php" class="btn btn-secondary mb-3">Back</a>

<form method="post" action="../../controllers/TicketController.php">
    <input type="hidden" name="action" value="createTicket">
    <div class="mb-2"><input type="text" name="patient_name" class="form-control" placeholder="Patient Name" required></div>
    <div class="mb-2"><input type="email" name="patient_email" class="form-control" placeholder="Patient Email" required></div>
    <div class="mb-2"><input type="text" name="patient_phone" class="form-control" placeholder="Patient Phone" required></div>
    <div class="mb-2"><textarea name="problem" class="form-control" placeholder="Problem" required></textarea></div>
    <div class="mb-2">
        <select name="doctor_id" class="form-control">
            <?php while ($row = pg_fetch_assoc($doctors)): ?>
                <option value="<?= $row['id'] ?>"><?= $row['name'] ?> (<?= $row['specialization'] ?>)</option>
            <?php endwhile; ?>
        </select>
    </div>
    <button class="btn btn-primary">Issue Ticket</button>
</form>

<?php include '../partials/footer.php'; ?>
