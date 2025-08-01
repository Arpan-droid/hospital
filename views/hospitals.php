<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospitals</title>
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
    <h1 class="mb-4 text-primary">Hospitals</h1>

    <form method="post" class="row mb-4">
        <div class="col-md-4"><input type="text" name="name" class="form-control" placeholder="Hospital Name" required></div>
        <div class="col-md-4"><input type="text" name="location" class="form-control" placeholder="Location"></div>
        <div class="col-md-4"><button type="submit" name="add" class="btn btn-success w-100">Add Hospital</button></div>
    </form>

    <table class="table table-bordered bg-white shadow-sm">
        <thead><tr><th>ID</th><th>Name</th><th>Location</th><th>Action</th></tr></thead>
        <tbody>
        <?php foreach ($hospitals as $h): ?>
            <tr>
                <td><?= $h['id'] ?></td>
                <td><?= htmlspecialchars($h['name']) ?></td>
                <td><?= htmlspecialchars($h['location']) ?></td>
                <td><a href="?page=hospitals&delete=<?= $h['id'] ?>" class="btn btn-danger btn-sm">Delete</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
