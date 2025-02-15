<?php
require_once 'Database.php';

class Organizations extends Database {
    private $table = "organizations";

    // Add a new organization
    public function addOrganization($college_id, $name, $logo_directory, $description) {
        $sql = "INSERT INTO $this->table (college_id, name, logo_directory, description) VALUES (:college_id, :name, :directory, :description)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':college_id' => $college_id,
                ':name' => $name,
                ':directory' => $logo_directory,
                ':description' => $description
            ]);
            return true; // Return true if the insert was successful
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
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

    // get all organization by organization id
    public function getAllOrganizationInfoById($id) {
        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Database error: " . $e->getMessage()); // Log the error message
            return false;
        }
    }

    function setPrimaryOrganization($college_id, $organization_id) {
        try {
            // Begin transaction
            $this->pdo->beginTransaction();
    
            // Step 1: Reset all organizations in this college to isPrimary = 0
            $stmt = $this->pdo->prepare("UPDATE $this->table SET isPrimary = 0 WHERE college_id = ?");
            $stmt->execute([$college_id]);
    
            // Step 2: Set the selected organization to isPrimary = 1
            $stmt = $this->pdo->prepare("UPDATE $this->table SET isPrimary = 1 WHERE id = :id AND college_id = :college_id");
            $stmt->execute([
                ':id' => $organization_id, 
                ':college_id' => $college_id
            ]);
    
            // Commit transaction
            $this->pdo->commit();
            return "Primary organization updated successfully.";
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            error_log("Database error: " . $e->getMessage()); // Log the error message
            return false;
        }
    }
}

//$obj = new Organizations();