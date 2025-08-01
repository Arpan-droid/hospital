<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Project - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 text-center">
        <h1 class="display-4 text-primary">Welcome to Hospital Project</h1>
        <p class="lead">This is the home page.</p>
        <?php if (isset($_SESSION['user'])): ?>
            <p>Logged in as <strong><?= htmlspecialchars($_SESSION['user']['email']) ?></strong></p>
            <a href="?page=logout" class="btn btn-danger">Logout</a>
        <?php else: ?>
            <a href="?page=login" class="btn btn-success">Login</a>
        <?php endif; ?>
    </div>
</body>
</html>
