<?php
require_once __DIR__ . '/../config/config.php';

class Prescription {
    private $conn;
    public function __construct() {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

 
    public function create($ticket_id, $diagnosis, $checkups, $medicines, $email) {
    $query = "INSERT INTO prescriptions (ticket_id, diagnosis, checkups, medicines) VALUES ($1, $2, $3, $4)";
    $result = pg_query_params($this->conn, $query, [$ticket_id, $diagnosis, $checkups, $medicines]);

    if ($result) {
        $message = "Diagnosis: $diagnosis\nCheckups: $checkups\nMedicines: $medicines";
        return sendEmail($email, "Your Prescription", $message);
    }
    return false;
}
}
require_once __DIR__ . '/../helpers/email.php';


