<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Project - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="/">🏥 Hospital Project</a>
        <div class="d-flex">
            <?php if (isset($_SESSION['user'])): ?>
                <span class="navbar-text me-3">
                    Hello, <strong><?= htmlspecialchars($_SESSION['user']['email']) ?></strong>
                </span>
                <a href="?page=logout" class="btn btn-outline-light btn-sm">Logout</a>
            <?php else: ?>
                <a href="?page=login" class="btn btn-outline-light btn-sm">Login</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Main content -->
<div class="container mt-5 text-center">
    <h1 class="display-4 text-primary mb-4">Welcome to the Hospital Management System</h1>
    <p class="lead">Easily manage hospitals, doctors, and patients from one place.</p>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h4>🏥 Hospitals</h4>
                <p>Manage all hospitals in the system.</p>
                <a href="?page=hospitals" class="btn btn-primary btn-sm">View Hospitals</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h4>👨‍⚕️ Doctors</h4>
                <p>View and assign doctors to hospitals.</p>
                <a href="?page=doctors" class="btn btn-primary btn-sm">View Doctors</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h4>🧑‍🤝‍🧑 Patients</h4>
                <p>Track patients and appointments.</p>
                <a href="?page=patients" class="btn btn-primary btn-sm">View Patients</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
