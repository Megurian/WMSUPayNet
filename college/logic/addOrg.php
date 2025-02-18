<?php
require_once '../../tools/functions.php';
require_once '../../database/autoload_classes.php';

$organizationObj = new Organizations();

$errors = [];

// Get and sanitize input
$college_id = clean_input($_POST['college_id']);
$organzation_code = clean_input($_POST['organizationCode'] ?? '');
$name = clean_input($_POST['organizationName'] ?? '');
$description = clean_input($_POST['description'] ?? '');
$logo_directory = '';

$organization_code_backend_validation = getAbbreviation($name);

// Validate input
if($organization_code_backend_validation !== $organzation_code) {
    $errors[] = 'Organization code modified.';
} elseif ($count = $organizationObj->checkDuplicateOrganizationCode($organization_code_backend_validation)) {
    $final_organization_code = $organization_code_backend_validation . $count + 1;
} else {
    $final_organization_code = $organization_code_backend_validation;
}

if (empty($name) || strlen($name) < 2 || strlen($name) > 50) {
    $errors[] = 'Organization name must be between 2 and 50 characters.';
} elseif (detectNumber($name) ){
    $errors[] = 'Organization name must not have number.';
}

if (strlen($description) > 255) {
    $errors[] = 'Maximum of 255 characters description.';
}

//directory setup
$logoname = $final_organization_code . "_" . "Logo";
$uploadDir = '../../images/uploads/';
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
$maxFileSize = 5 * 1024 * 1024; // 5MB

//image validation
if(empty($_FILES['logo']['name'])) {
    $errors[] = "Logo is required to create an organization.";
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

if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode("\n", $errors)]);
    exit;
}

// Insert into database
if ($organizationObj->addOrganization($college_id, $final_organization_code, $name, $logo_directory, $description)) {
    echo json_encode(['status' => 'success', 'message' => 'Organization added successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add organization.']);
}
