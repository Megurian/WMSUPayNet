<?php
require_once 'Database.php';

class Students extends Database {
    private $table = "students";

    public $user_id = '';
    public $school_id = '';
    public $first_name = '';
    public $last_name = '';
    public $middle_name = '';
    public $suffix_id = '';
    public $religion_id = '';
    public $college_id = '';
    public $course_id = '';

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
}

$obj = new Students();
//var_dump($obj->verifyStudent(202201078, 'Meg Ryan', 'Gomez', 1, 1));