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


    public function createAccount($student_id = null, $username, $email, $password, $role, $college_id) {
        $sql = "INSERT INTO $this->table (student_id, username, email, password, role, college_id) VALUES (:student_id, :username, :email, :password, :role, :college_id)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':student_id' => $student_id,
                ':username' => $username,
                ':email' => $email,
                ':password' => $password,
                ':role' => $role,
                ':college_id' => $college_id
            ]);
            return true; // Return true if the insert was successful
        } catch (PDOException $e) {
            return false; // Return false if there was an error
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
            if($data && password_verify($password, $data['password'])) {
                
                return true;
            }
        }

        return false; 
    }

    function fetchUser($email, $username){
        $sql = "SELECT * FROM $this->table WHERE ";

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