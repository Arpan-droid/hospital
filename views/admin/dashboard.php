<?php
require_once __DIR__ . '/../../helpers/sessions.php';
checkLogin('admin');
include '../partials/header.php';
?>

<h2>Admin Dashboard</h2>
<div class="list-group">
    <a href="doctors.php" class="list-group-item list-group-item-action">Manage Doctors</a>
    <a href="tickets.php" class="list-group-item list-group-item-action">Issue Tickets</a>
    <a href="stock.php" class="list-group-item list-group-item-action">Manage Stock</a>
</div>

<?php include '../partials/footer.php'; ?>
