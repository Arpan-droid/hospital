<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-primary mb-4">Hospitals</h1>
    <form method="post" class="row g-3 mb-4">
        <div class="col-md-5"><input name="name" placeholder="Hospital Name" class="form-control" required></div>
        <div class="col-md-5"><input name="location" placeholder="Location" class="form-control" required></div>
        <div class="col-md-2"><button type="submit" name="add" class="btn btn-primary w-100">Add</button></div>
    </form>

    <table class="table table-bordered">
        <thead><tr><th>ID</th><th>Name</th><th>Location</th><th>Action</th></tr></thead>
        <tbody>
            <?php foreach ($hospitals as $hospital): ?>
                <tr>
                    <td><?= $hospital['id'] ?></td>
                    <td><?= htmlspecialchars($hospital['name']) ?></td>
                    <td><?= htmlspecialchars($hospital['location']) ?></td>
                    <td><a href="?page=hospitals&delete=<?= $hospital['id'] ?>" class="btn btn-danger btn-sm">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/" class="btn btn-secondary mt-3">🏠 Home</a>
</div>
</body>
</html>
