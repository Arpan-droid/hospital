<?php
$database_url = getenv('DATABASE_URL');

if ($database_url) {
    $pdo = new PDO($database_url);
} else {
    $pdo = new PDO("pgsql:host=db.lkzqzqutzgswwillxhus.supabase.co;port=5432;dbname=postgres;sslmode=require", "postgres", "Arpan@2009");
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
