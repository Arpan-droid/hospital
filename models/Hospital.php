<?php
class Hospital {
    private $pdo;
    public function __construct($pdo) { $this->pdo = $pdo; }

    public function all() {
        return $this->pdo->query("SELECT * FROM hospitals")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($name, $location) {
        $stmt = $this->pdo->prepare("INSERT INTO hospitals (name, location) VALUES (?, ?)");
        return $stmt->execute([$name, $location]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM hospitals WHERE id=?");
        return $stmt->execute([$id]);
    }
}
?>
