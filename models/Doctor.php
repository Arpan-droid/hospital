<?php
class Doctor {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        $sql = "SELECT doctors.*, hospitals.name as hospital_name 
                FROM doctors 
                JOIN hospitals ON doctors.hospital_id = hospitals.id 
                ORDER BY doctors.id DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($hospital_id, $name, $specialty) {
        $stmt = $this->pdo->prepare("INSERT INTO doctors (hospital_id, name, specialty) VALUES (?, ?, ?)");
        $stmt->execute([$hospital_id, $name, $specialty]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM doctors WHERE id = ?");
        $stmt->execute([$id]);
    }
}
