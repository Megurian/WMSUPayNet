<?php
require_once 'Database.php';

class Suffixes extends Database {
    private $table = "suffixes";

    // Get all religions
    public function getAllSuffix() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
