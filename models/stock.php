<?php
require_once __DIR__ . '/../config/config.php';

class Stock {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAll($hospital_id) {
        return pg_query_params($this->conn, "SELECT * FROM stock WHERE hospital_id=$1", [$hospital_id]);
    }

    public function create($item_name, $quantity, $hospital_id) {
        $query = "INSERT INTO stock (item_name, quantity, hospital_id) VALUES ($1, $2, $3)";
        return pg_query_params($this->conn, $query, [$item_name, $quantity, $hospital_id]);
    }

    public function delete($id) {
        return pg_query_params($this->conn, "DELETE FROM stock WHERE id=$1", [$id]);
    }
}
