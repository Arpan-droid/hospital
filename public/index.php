<?php
// Load environment variables (Render sets them automatically)
$db_host = getenv('DB_HOST');
$db_name = getenv('DB_NAME');
$db_user = getenv('DB_USER');
$db_pass = getenv('DB_PASSWORD');

try {
    // Connect to Supabase (Postgres) using PDO
    $dsn = "pgsql:host=$db_host;port=5432;dbname=$db_name;sslmode=require";
    $pdo = new PDO($dsn, $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "<h1>Connected to Supabase!</h1>";

    // Test query
    $result = $pdo->query("SELECT NOW()")->fetch();
    echo "<p>Server time: " . $result['now'] . "</p>";

} catch (PDOException $e) {
    echo "<h1>Connection failed:</h1> " . $e->getMessage();
}
?>


<?php


session_start();
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: ../views/admin/dashboard.php");
    } else {
        header("Location: ../views/doctor/dashboard.php");
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Management - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="text-center mb-3">Login</h4>
                    <?php if (isset($_GET['error'])): ?>
                        <div class="alert alert-danger"><?= $_GET['error'] ?></div>
                    <?php endif; ?>
                    <form action="../controllers/AuthController.php" method="post">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Login As</label>
                            <select name="role" class="form-control">
                                <option value="admin">Admin (Hospital)</option>
                                <option value="doctor">Doctor</option>
                            </select>
                        </div>
                        <button class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
