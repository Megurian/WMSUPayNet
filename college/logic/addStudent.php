<?php
require_once '../../tools/functions.php';
require_once '../../database/autoload_classes.php';

$studentObj = new Students();

$errors = [];

$StudentInfo['no_middle_name'] = isset($_POST['no-middle-name']) ? true : false;
$StudentInfo['first_name'] = sentenceCase(clean_input($_POST['first_name']));
$StudentInfo['middle_name'] = sentenceCase(clean_input($_POST['middle_name']));
$StudentInfo['last_name'] = sentenceCase(clean_input($_POST['last_name']));

$StudentInfo['college'] = clean_input($_POST['college']);
$StudentInfo['school_id'] = removeDashChar(clean_input($_POST['studentId']));
$StudentInfo['year_level'] = clean_input($_POST['year_level']);
$StudentInfo['suffix'] = clean_input($_POST['suffix']);
$StudentInfo['course'] = clean_input($_POST['course']);
$StudentInfo['religion'] = clean_input($_POST['religion']);


//validation school id
if (empty($StudentInfo['school_id'])) {
    $errors[] = "School ID is required to add student.";
} elseif (!is_numeric($StudentInfo['school_id'])) {
    $errors[] = "School ID must be a number.";
}

//Validation First name
if (empty($StudentInfo['first_name'])) {
    $errors[] = 'First name is required to add student.';
} elseif (detectNumber($StudentInfo['first_name'])) {
    $errors[] = 'First name cannot contain numbers.';
} elseif (strlen($StudentInfo['first_name']) <= 1) {
    $errors[] = 'First name must be at least 2 characters long.';
}

//Special Validation for Middle name
$StudentInfo['no_middle_name'] = isset($_POST['no-middle-name']) ? true : false; 
if ($StudentInfo['no_middle_name']) {
    $StudentInfo['middle_name'] = null; // Set to null if no middle name is specified
} else {
    // Clean and validate the middle name input
    $StudentInfo['middle_name'] = sentenceCase(clean_input($_POST['middle_name']));

    if (!empty($StudentInfo['middle_name'])) {
        $StudentInfo['no_middle_name'] = false;
        if (detectNumber($StudentInfo['middle_name'])) {
            $errors[] = 'Middle name cannot contain numbers.';
        } elseif (strlen($StudentInfo['middle_name']) < 2) {
            $errors[] = 'Middle name must be at least 2 characters long.';
        }
    } else {
        $StudentInfo['no_middle_name'] = true;
    }
}

//Validation Last name
if (empty($StudentInfo['last_name'])) {
    $errors[] = 'Last name is required to add student';
} elseif (detectNumber($StudentInfo['last_name'])) {
    $errors[] = 'Last name cannot contain numbers.';
} elseif (strlen($StudentInfo['last_name']) <= 1) {
    $errors[] = 'Last name must be at least 2 characters long.';
}

if (empty($StudentInfo['suffix'])) {
    $StudentInfo['suffix'] = null;
}

if (empty($StudentInfo['year_level'])) {
    $errors[] = 'Year level is required to add student.';
}

//Validation for college
if (empty($StudentInfo['college'])) {
    $errors[] = 'College is required to add student.';
}

if (empty($StudentInfo['course'])) {
    $errors[] = 'Course is required to add student.';
}

if (empty($StudentInfo['religion'])) {
    $errors[] = 'Religion is required to add student.';
}

if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode("\n", $errors)]);
    exit;
}

// Insert into database

if ($studentObj->addStudent($StudentInfo['school_id'], $StudentInfo['first_name'], $StudentInfo['middle_name'], $StudentInfo['last_name'], $StudentInfo['suffix'], $StudentInfo['year_level'], $StudentInfo['religion'], $StudentInfo['college'], $StudentInfo['course'])) {
    echo json_encode(['status' => 'success', 'message' => 'Student added successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add student to college.']);
}