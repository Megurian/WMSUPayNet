<?php
require_once 'Database.php';

class Religions extends Database {
    private $table = "religions";

    // Get all religions
    public function getAllReligions() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
