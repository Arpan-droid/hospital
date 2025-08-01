<?php
class Doctor {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function all() {
        return $this->pdo->query("SELECT doctors.*, hospitals.name as hospital_name 
                                  FROM doctors 
                                  JOIN hospitals ON doctors.hospital_id = hospitals.id")
                                  ->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($hospital_id, $name, $specialty) {
        $stmt = $this->pdo->prepare("INSERT INTO doctors (hospital_id, name, specialty) VALUES (?, ?, ?)");
        return $stmt->execute([$hospital_id, $name, $specialty]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM doctors WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>
