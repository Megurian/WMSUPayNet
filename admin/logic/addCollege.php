<?php
require_once '../../tools/functions.php';
require_once '../../database/autoload_classes.php';

$collegeObj = new Colleges();

$errors = [];

// Get and sanitize input
$college_code = clean_input($_POST['collegeCode'] ?? '');
$name = clean_input(formatCollegeName($_POST['collegeName'] ?? ''));
$description = clean_input($_POST['description'] ?? '');
$logo_directory = '';

$college_code_backend_validation = getAbbreviation($name);

// Validate input
if($college_code_backend_validation !== $college_code) {
    $errors[] = 'College code modified.';
} elseif ($count = $collegeObj->checkDuplicateCollegeCode($college_code_backend_validation)) {
    $final_college_code = $college_code_backend_validation . $count + 1;
} else {
    $final_college_code = $college_code_backend_validation;
}

if (empty($name) || strlen($name) < 2 || strlen($name) > 50) {
    $errors[] = 'College name must be between 2 and 50 characters.';
} elseif (detectNumber($name) ){
    $errors[] = 'College name must not have number.';
}

if (strlen($description) > 255) {
    $errors[] = 'Maximum of 255 characters description.';
}

//directory setup
$logoname = $final_college_code . "_" . "Logo";
$uploadDir = '../../images/uploads/';
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
$maxFileSize = 5 * 1024 * 1024; // 5MB

//image validation
if(empty($_FILES['logo']['name'])) {
    $errors[] = "Logo is required to create a college.";
} else {
    // Ensure the upload directory exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = basename($_FILES['logo']['name']);
    $fileSize = $_FILES['logo']['size'];
    $fileType = $_FILES['logo']['type'];
    $fileError = $_FILES['logo']['error'];

    // Validation
    if (!in_array($fileType, $allowedTypes)) {
        $errors[] = "Only JPG, PNG, and GIF files are allowed.";
    } elseif ($fileSize > $maxFileSize) {
        $errors[] = "File size exceeds the 5MB limit.";
    } elseif ($fileError !== UPLOAD_ERR_OK) {
        $errors[] = "There was an error uploading logo.";
    } else {
        // If no errors, process the file
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $newFileName = $logoname . '.' . $fileActualExt;
        $targetFilePath = $uploadDir . $newFileName;

        // Move the file to the target directory
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $targetFilePath)) {
            $logo_directory = $targetFilePath; // Store image path for database upload
        } else {
            $errors[] = "There was an error moving $fileName to the upload directory.";
        }
    }
}

if (empty($errors)) {
    // Insert into database
    if ($collegeObj->addCollege($final_college_code, $name, $logo_directory, $description)) {
        echo json_encode(['status' => 'success', 'message' => 'College added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add college.']);
    }  
} else {
    //Return validation errors
    echo json_encode(['status' => 'error', 'message' => implode("\n", $errors)]);
    exit;
}