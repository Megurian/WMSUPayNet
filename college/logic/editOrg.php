<?php
require_once '../../tools/functions.php';
require_once '../../database/autoload_classes.php';

$organizationObj = new Organizations();

$errors = [];

// Get and sanitize input
$organization_id = clean_input($_POST['organization_id']);
$name = clean_input($_POST['organizationName'] ?? '');
$description = clean_input($_POST['description'] ?? '');
$logoUpdatedBool = clean_input($_POST['logoUpdated'] ?? false);
$logo_directory = '';

$server_organization_info = $organizationObj->getAllOrganizationInfoById($organization_id);

if (empty($name) || strlen($name) < 2 || strlen($name) > 50) {
    $errors[] = 'Organization name must be between 2 and 50 characters.';
} elseif (detectNumber($name) ){
    $errors[] = 'Organization name must not have number.';
}

if (strlen($description) > 255) {
    $errors[] = 'Maximum of 255 characters description.';
}

//image validation
if($logoUpdatedBool == true) {
    //directory setup
    $logoname = $server_organization_info['org_code'] . "_" . "Logo";
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
    $logo_directory = $server_organization_info['logo_directory'];
}

if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode("\n", $errors)]);
    exit;
}

// Insert into database
if ($organizationObj->editOrganization($organization_id, $name, $logo_directory, $description)) {
    echo json_encode(['status' => 'success', 'message' => 'Organization updated successfully.']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update organization.']);
}
