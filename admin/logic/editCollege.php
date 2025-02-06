<?php
require_once '../../tools/functions.php';
require_once '../../database/autoload_classes.php';

$collegeObj = new Colleges();

// Get and sanitize input
$collegeId = clean_input($_POST['collegeId'] ?? null);
$name = clean_input($_POST['collegeName'] ?? '');
$description = clean_input($_POST['description'] ?? '');
$logoUpdatedBool = clean_input($_POST['logoUpdated'] ?? 0);
$logo_directory = '';


// Validate input
$errors = [];

if (empty($collegeId) || !is_numeric($collegeId)) {
    $errors[] = 'Error to update college.';
}

if (empty($name) || strlen($name) < 2 || strlen($name) > 50) {
    $errors[] = 'College name must be between 2 and 50 characters.';
} elseif (detectNumber($name) ){
    $errors[] = 'College name must not have number.';
}

if (strlen($description) > 255) {
    $errors[] = 'Maximum of 255 characters description.';
}



//image validation
if($logoUpdatedBool == true) {
    //directory setup
    $logoname = getAbbreviation($name) . "_" . "Logo";
    $uploadDir = '../../images/uploads/';
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
    $maxFileSize = 5 * 1024 * 1024; // 5MB

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
} else {
    $logo_directory = $collegeObj->getCollegeById($collegeId)['logo_directory'];
}


if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode("\n", $errors)]);
    exit;
}

// Insert into database
if ($collegeObj->editCollege($collegeId, $name, $logo_directory, $description)) {
    echo json_encode(['status' => 'success', 'message' => 'College updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update college.']);
}
