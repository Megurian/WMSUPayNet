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

    // Get suffix name by suffix id
    public function getSuffixName($id) {
        $sql = "SELECT extension FROM $this->table WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        $extension = $stmt->fetch(PDO::FETCH_ASSOC); 
        return $extension ? $extension['extension'] : null;
    }
}
