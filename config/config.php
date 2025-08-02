<?php
// Database variables
$host = getenv('DB_HOST') ?: 'db.lkzqzqutzgswwillxhus.supabase.co';
$port = getenv('DB_PORT') ?: '5432';
$db   = getenv('DB_NAME') ?: 'postgres';
$user = getenv('DB_USER') ?: 'postgres';
$pass = getenv('DB_PASS') ?: 'Arpan@2009';

// Resolve IPv4 to avoid IPv6 network issues
$resolvedHost = gethostbyname($host);

try {
    // Force SSL (Supabase requires SSL)
    $dsn = "pgsql:host=$resolvedHost;port=$port;dbname=$db;sslmode=require";
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
