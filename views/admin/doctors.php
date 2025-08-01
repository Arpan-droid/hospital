<?php
require_once __DIR__ . '/../../helpers/sessions.php';
require_once __DIR__ . '/../../models/Doctor.php';
checkLogin('admin');
include '../partials/header.php';

$doctor = new Doctor();
$result = $doctor->getAll($_SESSION['user_id']);
?>

<h2>Manage Doctors</h2>
<a href="dashboard.php" class="btn btn-secondary mb-3">Back</a>

<form method="post" action="../../controllers/AdminController.php" class="mb-4">
    <input type="hidden" name="action" value="addDoctor">
    <div class="row g-2">
        <div class="col-md-3"><input type="text" name="name" class="form-control" placeholder="Name" required></div>
        <div class="col-md-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
        <div class="col-md-3"><input type="text" name="specialization" class="form-control" placeholder="Specialization" required></div>
        <div class="col-md-3"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
    </div>
    <button class="btn btn-primary mt-2">Add Doctor</button>
</form>

<table class="table table-bordered">
    <thead><tr><th>Name</th><th>Email</th><th>Specialization</th><th>Action</th></tr></thead>
    <tbody>
    <?php while ($row = pg_fetch_assoc($result)): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['specialization'] ?></td>
            <td>
                <form method="post" action="../../controllers/AdminController.php" class="d-inline">
                    <input type="hidden" name="action" value="deleteDoctor">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this doctor?');">Delete</button>
                </form>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>

<?php include '../partials/footer.php'; ?>
