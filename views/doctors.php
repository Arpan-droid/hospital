<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">🏥 Hospital Project</a>
        <a href="/" class="btn btn-outline-light btn-sm">Home</a>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="mb-4 text-primary">Doctors</h1>

    <form method="post" class="row mb-4">
        <div class="col-md-3">
            <select name="hospital_id" class="form-control" required>
                <option value="">Select Hospital</option>
                <?php foreach ($hospitals as $hospital): ?>
                    <option value="<?= $hospital['id'] ?>"><?= htmlspecialchars($hospital['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3"><input type="text" name="name" class="form-control" placeholder="Doctor Name" required></div>
        <div class="col-md-3"><input type="text" name="specialty" class="form-control" placeholder="Specialty"></div>
        <div class="col-md-3"><button type="submit" name="add" class="btn btn-success w-100">Add Doctor</button></div>
    </form>

    <table class="table table-bordered bg-white shadow-sm">
        <thead><tr><th>ID</th><th>Name</th><th>Specialty</th><th>Hospital</th><th>Action</th></tr></thead>
        <tbody>
        <?php foreach ($doctors as $d): ?>
            <tr>
                <td><?= $d['id'] ?></td>
                <td><?= htmlspecialchars($d['name']) ?></td>
                <td><?= htmlspecialchars($d['specialty']) ?></td>
                <td><?= htmlspecialchars($d['hospital_name']) ?></td>
                <td><a href="?page=doctors&delete=<?= $d['id'] ?>" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
