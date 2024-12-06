<?php
require_once 'Database.php';

class Admins extends Database {
    private $table = "admins";

    public $admin_id = '';
    public $first_name = '';
    public $middle_name = '';
    public $last_name = '';
    public $suffix_id = '';
    public $email = '';
    public $college_id = '';
    public $organization_id = '';

    // Add a new college admin
    public function addCollegeAdmin($first_name, $middle_name, $last_name, $suffix_id, $email, $college_id, $organization_id) {
        $sql = "INSERT INTO $this->table (first_name, middle_name, last_name, suffix_id, email, college_id, organization_id) 
                VALUES (:first_name, :middle_name, :last_name, :suffix_id, :email, :college_id, :organization_id)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':first_name' => $first_name,
                ':middle_name' => $middle_name,
                ':last_name' => $last_name,
                ':suffix_id' => $suffix_id,
                ':email' => $email,
                ':college_id' => $college_id,
                ':organization_id' => $organization_id
            ]);

            return $this->pdo->lastInsertId(); // Return last inserted if the insert was successful
        } catch (PDOException $e) {
            return false; // Return false if there was an error
        }
    }

    public function checkDuplicateEmail($email){
        $sql = "SELECT COUNT(*) as count FROM $this->table WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':email' => $email
            ]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result['count'] > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage()); // Log the error for debugging
            return false;
        }
    }

    //get all college admin by college id
    public function getAllCollegeAdminById($college_id) {
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