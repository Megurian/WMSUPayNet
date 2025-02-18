<?php
require_once 'Database.php';

class Colleges extends Database {
    private $table = "colleges";

    // Add a new college
    public function addCollege($college_code, $name, $logo_directory, $description) {
        $sql = "INSERT INTO $this->table (college_code, college, logo_directory, description) VALUES (:college_code, :name, :directory, :description)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':college_code' => $college_code,
                ':name' => $name,
                ':directory' => $logo_directory,
                ':description' => $description,
            ]);
            return true; // Return true if the insert was successful
        } catch (PDOException $e) {
            return false; // Return false if there was an error
        }
    }

    public function editCollege($id, $name, $logo_directory, $description) {
        $sql = "UPDATE $this->table SET college = :name, logo_directory = :directory, description = :description WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':id' => $id,
                ':name' => $name,
                ':directory' => $logo_directory,
                ':description' => $description,
            ]);
            return true; // Return true if the update was successful
        } catch (PDOException $e) {
            return false; // Return false if there was an error
        }
    }

    public function deleteCollege($id) {
        $sql = "DELETE FROM $this->table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([':id' => $id]);
            return true; // Return true if the delete was successful
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

    public function checkCollege($id) {
        $sql = "SELECT COUNT(*) as count FROM $this->table WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result['count'] > 0) {
            return true;
        } else {
            return false;
        }
    }
}

/* $Obj = new Colleges();
$Obj->deleteCollege(9); */
