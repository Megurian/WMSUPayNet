<?php
require_once 'Database.php';

class Courses extends Database {
    private $table = "courses";

    // Add a new course
    public function addCourse($name, $collegeId) {
        $sql = "INSERT INTO $this->table (name, college_id) VALUES (:name, :college_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':college_id' => $collegeId
        ]);
        return $this->pdo->lastInsertId();
    }

    // Get all courses for a specific college
    public function getCoursesByCollege($collegeId) {
        $sql = "SELECT * FROM $this->table WHERE college_id = :college_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':college_id' => $collegeId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCourses() {
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

$obj = new Courses();

