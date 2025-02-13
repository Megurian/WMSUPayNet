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
    public function addCollegeAdmin($first_name, $middle_name, $last_name, $suffix_id, $college_id, $organization_id) {

        
        try {
            $sql = "INSERT INTO $this->table (first_name, middle_name, last_name, suffix_id, college_id, organization_id) 
                                      VALUES (:first_name, :middle_name, :last_name, :suffix_id, :college_id, :organization_id)";
            $this->pdo->beginTransaction(); // Begin a transaction

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                ':first_name' => $first_name,
                ':middle_name' => $middle_name,
                ':last_name' => $last_name,
                ':suffix_id' => $suffix_id,
                ':college_id' => $college_id,
                ':organization_id' => $organization_id
            ]);

            $admin_id = $this->pdo->lastInsertId(); // Get the last inserted admin id

            $this->pdo->commit(); // Commit the transaction
            return $admin_id; // Return admin_id if the insert was successful
        } catch (PDOException $e) {
            return false; // Return false if there was an error
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

    function fetchAdminEmail($account_id){
        $sql = "SELECT a.email 
                FROM accounts a
                INNER JOIN admins ad ON a.id = ad.account_id
                WHERE ad.account_id = :account_id;";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':account_id' => $account_id
            ]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            error_log("Database error: " . $e->getMessage()); // Log the error message
            return false;
        }
    }
}