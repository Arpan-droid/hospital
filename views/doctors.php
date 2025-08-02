<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-success mb-4">Doctors</h1>
    <form method="post" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="hospital_id" class="form-control" required>
                <option value="">Select Hospital</option>
                <?php foreach ($hospitals as $hospital): ?>
                    <option value="<?= $hospital['id'] ?>"><?= htmlspecialchars($hospital['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3"><input name="name" placeholder="Doctor Name" class="form-control" required></div>
        <div class="col-md-3"><input name="specialty" placeholder="Specialty" class="form-control"></div>
        <div class="col-md-3"><button type="submit" name="add" class="btn btn-success w-100">Add</button></div>
    </form>

    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Name</th><th>Specialty</th><th>Hospital</th><th>Action</th></tr></thead>
        <tbody>
            <?php foreach ($doctors as $doctor): ?>
                <tr>
                    <td><?= $doctor['id'] ?></td>
                    <td><?= htmlspecialchars($doctor['name']) ?></td>
                    <td><?= htmlspecialchars($doctor['specialty']) ?></td>
                    <td><?= htmlspecialchars($doctor['hospital_name']) ?></td>
                    <td><a href="?page=doctors&delete=<?= $doctor['id'] ?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/" class="btn btn-secondary mt-3">🏠 Home</a>
</div>
</body>
</html>
