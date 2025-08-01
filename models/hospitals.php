<?php
require_once __DIR__ . '/../config/config.php';

class Hospital {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function login($email, $password) {
        $result = pg_query_params($this->conn, "SELECT * FROM hospitals WHERE email=$1", [$email]);
        if (pg_num_rows($result) > 0) {
            $hospital = pg_fetch_assoc($result);
            if (password_verify($password, $hospital['password'])) {
                return $hospital;
            }
        }
        return false;
    }
}
