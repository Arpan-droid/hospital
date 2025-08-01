<?php
class Database {
    private $conn;

    public function getConnection() {
        // Supabase Postgres connection string
        $host = "db.lkzqzqutzgswwillxhus.supabase.co";
        $port = "5432";
        $dbname = "postgres";
        $user = "postgres";
        $password = "Arpan@2009";

        $connString = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require";

        $this->conn = pg_connect($connString);

        if (!$this->conn) {
            die("DB Connection Failed: " . pg_last_error());
        }
        return $this->conn;
    }
}
