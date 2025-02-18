<?php
require_once '../../tools/functions.php';
require_once '../../database/autoload_classes.php';

$adminObj = new Admins();
$accountObj = new Accounts();
$collegeObj = new Colleges();

$errors = [];

$Data['college'] = clean_input($_POST['college']);
$Data['no_middle_name'] = isset($_POST['no-middle-name']) ? true : false;
$Data['first_name'] = sentenceCase(clean_input($_POST['first_name']));
$Data['middle_name'] = sentenceCase(clean_input($_POST['middle_name']));
$Data['last_name'] = sentenceCase(clean_input($_POST['last_name']));
$Data['suffix'] = clean_input($_POST['suffix']);
$Data['email'] = clean_input($_POST['email']);
$Data['password'] = clean_input($_POST['password']);
$Data['confirm_password'] = clean_input($_POST['confirm-password']);

//Validation First name
if (empty($Data['first_name'])) {
    $errors[] = 'First name is required to signup';
} elseif (detectNumber($Data['first_name'])) {
    $errors[] = 'First name cannot contain numbers.';
} elseif (strlen($Data['first_name']) <= 1) {
    $errors[] = 'First name must be at least 2 characters long.';
}

//Special Validation for Middle name
$Data['no_middle_name'] = isset($_POST['no-middle-name']) ? true : false; 
if ($Data['no_middle_name']) {
    $Data['middle_name'] = null; // Set to null if no middle name is specified
} else {
    // Clean and validate the middle name input
    $Data['middle_name'] = sentenceCase(clean_input($_POST['middle_name']));

    if (!empty($Data['middle_name'])) {
        $Data['no_middle_name'] = false;
        if (detectNumber($Data['middle_name'])) {
            $errors[] = 'Middle name cannot contain numbers.';
        } elseif (strlen($Data['middle_name']) < 2) {
            $errors[] = 'Middle name must be at least 2 characters long.';
        }
    } else {
        $Data['no_middle_name'] = true;
    }
}

//Validation Last name
if (empty($Data['last_name'])) {
    $errors[] = 'Last name is required to signup';
} elseif (detectNumber($Data['last_name'])) {
    $errors[] = 'Last name cannot contain numbers.';
} elseif (strlen($Data['last_name']) <= 1) {
    $errors[] = 'Last name must be at least 2 characters long.';
}

if (empty($Data['suffix'])) {
    $Data['suffix'] = null;
}

//Validation for college
if (empty($Data['college'])) {
    $errors[] = 'College is required to signup.';
} elseif (!is_numeric($Data['college'])) {
    $errors[] = 'College ID modified.';
} elseif (!$collegeObj->checkCollege($Data['college'])) {
    $errors[] = 'College does not exist.';
}

//Validation Email
if (empty($Data['email'])) {
    $errors[] = 'Email is required to signup';
} elseif (!filter_var($Data['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email.';
} elseif ($accountObj->checkDuplicateEmail($Data['email'])) {
    $errors[] = 'Email entered is already in use.';
}

//Validation Password
if (empty($Data['password'])) {
    $errors[] = 'Password is required to signup';
} elseif (strlen($Data['password']) < 8) {
    $errors[] = 'Enter atleast 8 characters password';
} elseif (
    !preg_match('/[0-9]/', $Data['password']) ||
    !preg_match('/[A-Z]/', $Data['password']) ||
    !preg_match('/[a-z]/', $Data['password']) ||
    !preg_match('/[^a-zA-Z\d]/', $Data['password'])
) {
    $errors[] = 'Password must contain at least 1 number, 1 uppercase, 1 lowercase, 1 special';
} elseif (
    strpos($Data['password'], $Data['first_name']) !== false ||
    strpos($Data['password'], $Data['last_name']) !== false ||
    strpos($Data['password'], $Data['email']) !== false
) {
    $errors[] = 'Weak password, please try a different password.';
} elseif (empty($Data['confirm_password'])) {
    $errors[] = 'Please confirm your password.';
} elseif ($Data['confirm_password'] != $Data['password']) {
    $errors[] = 'Password does not match!';
}

if (!empty($errors)) {
    echo json_encode(['status' => 'error', 'message' => implode("\n", $errors)]);
    exit;
}

// Insert into database
$username = extractUsername($Data['email']);
$role = 'CollegeAdmin';

if ($lastInsertedAdminId = $adminObj->addCollegeAdmin($Data['first_name'], $Data['middle_name'], $Data['last_name'], $Data['suffix'], $Data['college'], null)) {

    if($accountObj->createAccount(null, $lastInsertedAdminId, $username, $Data['email'], $Data['password'], $role, $Data['college'])) {
        echo json_encode(['status' => 'success', 'message' => 'College admin added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to register college admin. 2']);
    }

} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add college admin. 1']);
}