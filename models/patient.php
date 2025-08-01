<?php
require_once __DIR__ . '/../config/db.php';

class Patient {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function create($name, $email, $phone) {
        $stmt = $this->conn->prepare("INSERT INTO patients (name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);
        $stmt->execute();
        return $this->conn->insert_id;
    }

    public function get($id) {
        $stmt = $this->conn->prepare("SELECT * FROM patients WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
