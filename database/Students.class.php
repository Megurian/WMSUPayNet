<?php
require_once 'Database.php';

class Students extends Database {
    private $table = "students";

    public $id = '';
    public $school_id = '';
    public $first_name = '';
    public $last_name = '';
    public $middle_name = '';
    public $suffix_id = '';
    public $religion_id = '';
    public $college_id = '';
    public $course_id = '';

    // add student
    public function addStudent($school_id, $first_name, $middle_name, $last_name, $suffix, $year_level, $religion, $college, $course) {
        $sql = "INSERT INTO $this->table (school_id, first_name, middle_name, last_name, suffix_id, year_level, religion_id, college_id, course_id) 
                VALUES (:school_id, :first_name, :middle_name, :last_name, :suffix, :year_level, :religion_id, :college_id, :course_id)";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':school_id' => $school_id,
                ':first_name' => $first_name,
                ':middle_name' => $middle_name,
                ':last_name' => $last_name,
                ':suffix' => $suffix,
                ':year_level' => $year_level,
                ':religion_id' => $religion,
                ':college_id' => $college,
                ':course_id' => $course
            ]);

            return true;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage()); // Log the error for debugging
            return false; // Return false if there was an error
        }
    }


    // verify student
    public function verifyStudent($school_id, $first_name, $last_name, $college_id, $course_id) {
        $sql = "SELECT * FROM $this->table WHERE school_id = :school_id 
                                             AND first_name = :first_name
                                             AND last_name = :last_name
                                             AND college_id = :college_id
                                             AND course_id = :course_id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':school_id' => $school_id,
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':college_id' => $college_id,
            ':course_id' => $course_id
        ]);

        if($stmt->fetch()){
            return true;
        }
        return false;
    }

    //count student per college
    public function countStudents($college_id) {
        $sql = "SELECT COUNT(*) as student_count FROM $this->table WHERE college_id = :college_id";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':college_id' => $college_id,
            ]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['student_count'];
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage()); // Log the error for debugging
            return false;
        }
    }

    //fetch student by college id
    public function getStudentsbyCollegeId($college_id) {
        $sql = "SELECT * FROM $this->table WHERE college_id = :college_id";
        $stmt = $this->pdo->prepare($sql);
        try {
            $stmt->execute([
                ':college_id' => $college_id,
            ]);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage()); // Log the error for debugging
            return false;
        }
    }
    
}

$obj = new Students();
//$obj->addStudent(101, 'Test', 'Test', 'Test', 3, 2, 1, 1, 1);
//var_dump($obj->getStudentsbyCollegeId(1));