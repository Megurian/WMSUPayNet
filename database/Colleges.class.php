<?php
require_once 'Database.php';

class Colleges extends Database {
    private $table = "colleges";

    // Add a new college
    public function addCollege($name) {
        $sql = "INSERT INTO $this->table (name) VALUES (:name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':name' => $name]);
        return $this->pdo->lastInsertId();
    }

    // Get all colleges
    public function getAllColleges() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
