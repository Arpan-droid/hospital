<?php
class Patient {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function all() {
        return $this->pdo->query("SELECT patients.*, doctors.name as doctor_name 
                                  FROM patients 
                                  JOIN doctors ON patients.doctor_id = doctors.id")
                                  ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($doctor_id, $name, $age) {
        $stmt = $this->pdo->prepare("INSERT INTO patients (doctor_id, name, age) VALUES (?, ?, ?)");
        return $stmt->execute([$doctor_id, $name, $age]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM patients WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>
