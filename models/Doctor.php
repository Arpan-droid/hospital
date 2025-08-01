<?php
require_once __DIR__ . '/../config/config.php';

class Doctor {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function login($email, $password) {
        $result = pg_query_params($this->conn, "SELECT * FROM doctors WHERE email=$1", [$email]);
        if (pg_num_rows($result) > 0) {
            $doctor = pg_fetch_assoc($result);
            if (password_verify($password, $doctor['password'])) {
                return $doctor;
            }
        }
        return false;
    }

    public function getAll($hospital_id) {
        return pg_query_params($this->conn, "SELECT * FROM doctors WHERE hospital_id=$1", [$hospital_id]);
    }

    public function create($name, $email, $specialization, $password, $hospital_id) {
        $query = "INSERT INTO doctors (name, email, specialization, password, hospital_id) VALUES ($1, $2, $3, $4, $5)";
        return pg_query_params($this->conn, $query, [$name, $email, $specialization, $password, $hospital_id]);
    }

    public function delete($id) {
        return pg_query_params($this->conn, "DELETE FROM doctors WHERE id=$1", [$id]);
    }
}
