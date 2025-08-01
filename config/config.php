<?php
$host = 'db.lkzqzqutzgswwillxhus.supabase.co';
$db   = 'postgres';
$user = 'postgres';   // change if needed
$pass = 'Arpan@2009';       // change if needed

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
?>
