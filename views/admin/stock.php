<?php
require_once __DIR__ . '/../../helpers/sessions.php';
checkLogin('admin');
require_once __DIR__ . '/../../models/Stock.php';
include '../partials/header.php';

$stock = new Stock();
$result = $stock->getAll($_SESSION['user_id']);
?>

<div class="d-flex justify-content-between mb-3">
    <h2>Stock Management</h2>
    <a href="dashboard.php" class="btn btn-secondary">Back</a>
</div>

<!-- Add Item Form -->
<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="../../controllers/AdminController.php">
            <input type="hidden" name="action" value="addStock">
            <div class="row g-2">
                <div class="col-md-8"><input type="text" name="item_name" class="form-control" placeholder="Item Name" required></div>
                <div class="col-md-4"><input type="number" name="quantity" class="form-control" placeholder="Quantity" required></div>
            </div>
            <div class="mt-2">
                <button class="btn btn-primary">Add Item</button>
            </div>
        </form>
    </div>
</div>

<!-- Items List -->
<table class="table table-bordered table-striped">
    <thead>
        <tr><th>Item</th><th>Quantity</th><th>Action</th></tr>
    </thead>
    <tbody>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['item_name'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td>
                    <form method="post" action="../../controllers/AdminController.php" class="d-inline">
                        <input type="hidden" name="action" value="deleteStock">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this item?');">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="3">No stock items found</td></tr>
    <?php endif; ?>
    </tbody>
</table>

<?php include '../partials/footer.php'; ?>
