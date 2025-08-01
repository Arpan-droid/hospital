<?php
$host = getenv('DB_HOST') ?: 'db.lkzqzqutzgswwillxhus.supabase.co';
$port = getenv('DB_PORT') ?: '5432';
$db   = getenv('DB_NAME') ?: 'postgres';
$user = getenv('DB_USER') ?: 'postgres';
$pass = getenv('DB_PASS') ?: 'Arpan@2009';

try {
    if (getenv('DB_TYPE') === 'pgsql') {
        // Postgres (Supabase)
        $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    } else {
        // MySQL (Default)
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=utf8";
    }

    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
