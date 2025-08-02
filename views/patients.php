<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-warning mb-4">Patients</h1>
    <form method="post" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="doctor_id" class="form-control" required>
                <option value="">Select Doctor</option>
                <?php foreach ($doctors as $doctor): ?>
                    <option value="<?= $doctor['id'] ?>"><?= htmlspecialchars($doctor['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3"><input name="name" placeholder="Patient Name" class="form-control" required></div>
        <div class="col-md-3"><input name="age" placeholder="Age" type="number" class="form-control" required></div>
        <div class="col-md-3"><button type="submit" name="add" class="btn btn-warning w-100">Add</button></div>
    </form>

    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Name</th><th>Age</th><th>Doctor</th><th>Action</th></tr></thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?= $patient['id'] ?></td>
                    <td><?= htmlspecialchars($patient['name']) ?></td>
                    <td><?= $patient['age'] ?></td>
                    <td><?= htmlspecialchars($patient['doctor_name']) ?></td>
                    <td><a href="?page=patients&delete=<?= $patient['id'] ?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/" class="btn btn-secondary mt-3">🏠 Home</a>
</div>
</body>
</html>
