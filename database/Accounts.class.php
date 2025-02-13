<?php
require_once 'Database.php';

class Accounts extends Database {
    private $table = "accounts";

    public $student_id = '';
    public $username = '';
    public $email = '';
    public $password = '';
    public $role = '';
    public $created_at = '';


    /* public function createAccount($student_id = null, $admin_id = null, $username, $email, $password, $role, $college_id) {
        $encryptedPassword = password_hash($password, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 2]);
    
        // Determine whether the account is for a student or admin
        $columns = $student_id !== null ? 'student_id, username, email, password, role, college_id' : 'admin_id, username, email, password, role, college_id';
        $values = $student_id !== null ? ':student_id, :username, :email, :password, :role, :college_id' : ':admin_id, :username, :email, :password, :role, :college_id';
        
        try {
            $this->pdo->beginTransaction(); // Begin a transaction

            $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
            $stmt = $this->pdo->prepare($sql);

            $params = [
                ':username' => $username,
                ':email' => $email,
                ':password' => $encryptedPassword,
                ':role' => $role,
                ':college_id' => $college_id
            ];
    
            if ($student_id !== null) {
                $params[':student_id'] = $student_id;
            } else {
                $params[':admin_id'] = $admin_id;
            }
    
            $stmt->execute($params);
            $lastInsertId = $this->pdo->lastInsertId();
    
            if ($student_id !== null) {
                $updateSql = "UPDATE students SET is_registered = 1 WHERE account_id = :lastInsertId";
                $updateStmt = $this->pdo->prepare($updateSql);
                $updateStmt->execute([':lastInsertId' => $lastInsertId]);
            }
            
            $this->pdo->commit(); // Commit the transaction
            return true; // Return true if the insert was successful
        } catch (PDOException $e) {
            $this->pdo->rollBack(); //Rollback in case of error
            error_log("Database error: " . $e->getMessage());
            return false; // Return false if there was an error
        }
    } */

    public function createAccount($student_id = null, $admin_id = null, $username, $email, $password, $role, $college_id) {
        $encryptedPassword = password_hash($password, PASSWORD_ARGON2ID, ['memory_cost' => 2048, 'time_cost' => 4, 'threads' => 2]);
    
        // Determine whether the account is for a student or admin
        $columns = 'username, email, password, role, college_id';
        $values = ':username, :email, :password, :role, :college_id';
        
        try {
            $this->pdo->beginTransaction(); // Begin a transaction

            $sql = "INSERT INTO $this->table ($columns) VALUES ($values)";
            $stmt = $this->pdo->prepare($sql);

            $params = [
                ':username' => $username,
                ':email' => $email,
                ':password' => $encryptedPassword,
                ':role' => $role,
                ':college_id' => $college_id
            ];
    
            $stmt->execute($params);
            $lastInsertId = $this->pdo->lastInsertId();
    
            if ($student_id !== null) {
                $updateSql = "UPDATE students SET account_id = :lastInsertId, is_registered = 1 WHERE school_id = :student_id";
                $updateStmt = $this->pdo->prepare($updateSql);
                $updateStmt->execute([':lastInsertId' => $lastInsertId, 
                                              ':student_id' => $student_id]);
            } else {
                $updateSql = "UPDATE admins SET account_id = :lastInsertId WHERE admin_id = :admin_id";
                $updateStmt = $this->pdo->prepare($updateSql);
                $updateStmt->execute([':lastInsertId' => $lastInsertId, 
                                              ':admin_id' => $admin_id]);
            }
            
            $this->pdo->commit(); // Commit the transaction
            return true; // Return true if the insert was successful
        } catch (PDOException $e) {
            $this->pdo->rollBack(); //Rollback in case of error
            error_log("Database error: " . $e->getMessage());
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

    function userLogin($email, $username, $password) {
        $sql = "SELECT * FROM $this->table WHERE ";

        //decide whether username/email to use
        if(!is_null($email)) {
            $sql .= "email = :email LIMIT 1;";
            $prepQuery = $this->pdo->prepare($sql);
            $prepQuery->bindParam(':email', $email);
        } elseif (!is_null($username)) {
            $sql .= "username = :username LIMIT 1;";
            $prepQuery = $this->pdo->prepare($sql);
            $prepQuery->bindParam(':username', $username);
        } else {
            return false;
        }

        if($prepQuery->execute()) {
            $data = $prepQuery->fetch();
            if($data/*  && password_verify($password, $data['password']) */) {
                
                return true;
            }
        }

        return false; 
    }

    function fetchUser($email, $username){
        $sql = "SELECT username, role, college_id FROM $this->table WHERE ";

        if(!is_null($email)) {
            $sql .= "email = :email LIMIT 1;";
            $prepQuery = $this->pdo->prepare($sql);
            $prepQuery->bindParam(':email', $email);
        } elseif (!is_null($username)) {
            $sql .= "username = :username LIMIT 1;";
            $prepQuery = $this->pdo->prepare($sql);
            $prepQuery->bindParam(':username', $username);
        } else {
            return false;
        }

        $data = null;
        if($prepQuery->execute()){
            $data = $prepQuery->fetch();
        }

        return $data;
    }

}

$obj = new Students();
//var_dump($obj->verifyStudent(202201078, 'Meg Ryan', 'Gomez', 1, 1));