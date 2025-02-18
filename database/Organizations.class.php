<?php
require_once 'Database.php';

class Organizations extends Database {
    private $table = "organizations";

    // Add a new organization
    public function addOrganization($college_id, $code, $name, $logo_directory, $description) {
        $sql = "INSERT INTO $this->table (college_id, org_code, name, logo_directory, description) VALUES (:college_id, :code, :name, :directory, :description)";
        try {
            $this->pdo->beginTransaction();

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ':college_id' => $college_id,
                ':code' => $code,
                ':name' => $name,
                ':directory' => $logo_directory,
                ':description' => $description
            ]);

            $this->pdo->commit(); // Commit the transaction if successful
            return true; // Return true if the insert was successful
        } catch (PDOException $e) {
            $this->pdo->rollBack(); // Rollback in case of error
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

    function confirmOrganizationName($organization_id){
        $sql = "SELECT name FROM $this->table WHERE id = :id;";
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $organization_id
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC)['name'];
        } catch (PDOException $e) {
            error_log("Database error: ". $e->getMessage()); // Log the error message
            return false;
        }
    }

    function deactivateOrganization($organization_id, $organization_name, $reason){
        $sql = "UPDATE $this->table SET isActive = 0, deactivationReason = :reason WHERE id = :id AND name = :name;";
        try {
            // Begin transaction
            $this->pdo->beginTransaction();
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':id' => $organization_id,
                ':name' => $organization_name,
                ':reason' => $reason
            ]);
            // Commit transaction
            $this->pdo->commit();
            return "Organization deactivated successfully.";
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            error_log("Database error: ". $e->getMessage()); // Log the error message
            return false;

        }
    }

    function reactivateOrganization($organization_id) {
        try {
            // Begin transaction
            $this->pdo->beginTransaction();
    
            $stmt = $this->pdo->prepare("UPDATE $this->table SET isActive = 1, deactivationReason = NULL WHERE id = :id;");
            $stmt->execute([
                ':id' => $organization_id, 
            ]);
    
            // Commit transaction
            $this->pdo->commit();
            return "Organization reactivated successfully.";
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            error_log("Database error: " . $e->getMessage()); // Log the error message
            return false;
        }
    }

    function deleteOrganization($organization_id) {
        try {
            // Begin transaction
            $this->pdo->beginTransaction();
    
            $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id;");
            $stmt->execute([
                ':id' => $organization_id, 
            ]);
    
            // Commit transaction
            $this->pdo->commit();
            return "Organization deleted successfully.";
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            error_log("Database error: " . $e->getMessage()); // Log the error message
            return "Unable to delete organization.";
        }
    }

    public function checkDuplicateOrganizationCode($code) {
        $sql = "SELECT COUNT(*) as count FROM $this->table WHERE org_code = :code";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':code' => $code]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] > 0) {
            return $result['count'];
        } else {
            return false;
        }
    }
}

/* $obj = new Organizations();
echo $obj->checkDuplicateOrganizationCode("VP"); */