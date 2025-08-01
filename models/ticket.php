<?php
require_once __DIR__ . '/../config/config.php';

class Ticket {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create($patient_name, $patient_email, $patient_phone, $problem, $doctor_id) {
        $query = "INSERT INTO tickets (patient_name, patient_email, patient_phone, problem, doctor_id) VALUES ($1, $2, $3, $4, $5)";
        return pg_query_params($this->conn, $query, [$patient_name, $patient_email, $patient_phone, $problem, $doctor_id]);
    }

    public function getByDoctor($doctor_id) {
        return pg_query_params($this->conn, "SELECT * FROM tickets WHERE doctor_id=$1 ORDER BY created_at DESC", [$doctor_id]);
    }
}
