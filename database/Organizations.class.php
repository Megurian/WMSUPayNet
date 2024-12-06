<?php
require_once 'Database.php';

class Organizations extends Database {
    private $table = "organizations";

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

    // get all organization by college_id
    public function getAllOrganizationById($college_id) {
        $sql = "SELECT * FROM $this->table WHERE college_id = :college_id";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':college_id' => $college_id
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Database error: " . $e->getMessage()); // Log the error message
            return false;
        }
    }
}