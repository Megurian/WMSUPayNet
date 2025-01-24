<?php
require_once 'Database.php';

class Colleges extends Database {
    private $table = "colleges";

    // Add a new college
    public function addCollege($name, $logo_directory, $description) {
        $sql = "INSERT INTO $this->table (college, logo_directory, description) VALUES (:name, :directory, :description)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':name' => $name,
                ':directory' => $logo_directory,
                ':description' => $description,
            ]);
            return true; // Return true if the insert was successful
        } catch (PDOException $e) {
            return false; // Return false if there was an error
        }
    }

    // Get all colleges
    public function getAllColleges() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCollegeById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            throw new Exception("College not found");
        }
        return $result;
    }
}
?>
