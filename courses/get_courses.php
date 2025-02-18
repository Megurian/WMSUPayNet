<?php
require_once '../database/autoload_classes.php';
require_once '../tools/functions.php';

if (isset($_POST['college_id'])) {
    $collegeId = clean_input($_POST['college_id']);
    $selectedCourseId = isset($_POST['selected_course_id']) ? clean_input($_POST['selected_course_id']) : null;

    $coursesObj = new Courses();
    $coursesList = $coursesObj->getCoursesByCollege($collegeId);

    foreach ($coursesList as $course) {
        // Check if this course is the selected one
        $selected = ($course['id'] == $selectedCourseId) ? ' selected' : '';
        echo '<option value="' . $course['id'] . '"' . $selected . '>' . $course['course'] . '</option>';
    }
}