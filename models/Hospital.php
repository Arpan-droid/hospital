<?php
class Hospital {
    private $pdo;
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function all() {
        return $this->pdo->query("SELECT * FROM hospitals ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $location) {
        $stmt = $this->pdo->prepare("INSERT INTO hospitals (name, location) VALUES (?, ?)");
        $stmt->execute([$name, $location]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM hospitals WHERE id = ?");
        $stmt->execute([$id]);
    }
}
