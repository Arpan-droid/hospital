<?php
class Patient {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $sql = "SELECT patients.*, doctors.name as doctor_name 
                FROM patients 
                JOIN doctors ON patients.doctor_id = doctors.id 
                ORDER BY patients.id DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($doctor_id, $name, $age) {
        $stmt = $this->pdo->prepare("INSERT INTO patients (doctor_id, name, age) VALUES (?, ?, ?)");
        $stmt->execute([$doctor_id, $name, $age]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM patients WHERE id = ?");
        $stmt->execute([$id]);
    }
}
