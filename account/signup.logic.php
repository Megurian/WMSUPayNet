<?php
require_once '../tools/functions.php';
require_once '../database/autoload_classes.php';

session_start();

$studentObj = new Students();

$StudentInfo = $_SESSION['StudentInfo'] ?? [];
$Errors = $_SESSION['Errors'] ?? [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $StudentInfo['no_middle_name'] = isset($_POST['no-middle-name']) ? true : false;
    $StudentInfo['school_id'] = removeDashChar(clean_input($_POST['school-id']));
    $StudentInfo['first_name'] = sentenceCase(clean_input($_POST['first-name']));
    $StudentInfo['middle_name'] = sentenceCase(clean_input($_POST['middle-name']));
    $StudentInfo['last_name'] = sentenceCase(clean_input($_POST['last-name']));
    $StudentInfo['suffix'] = clean_input($_POST['suffix']);
    $StudentInfo['college'] = clean_input($_POST['college']);
    $StudentInfo['course'] = clean_input($_POST['course']);
    $StudentInfo['religion'] = clean_input($_POST['religion']);
    $StudentInfo['email'] = clean_input($_POST['email']);
    $StudentInfo['password'] = clean_input($_POST['password']);
    $StudentInfo['confirm_password'] = clean_input($_POST['confirm-password']);


    //validation school id
    if (empty($StudentInfo['school_id'])) {
        $Errors['school_id'] = "School ID is required to signup";
    } elseif (!is_numeric($StudentInfo['school_id'])) {
        $Errors['school_id'] = "School ID must be a number";
    }

    //Validation First name
    if (empty($StudentInfo['first_name'])) {
        $Errors['first_name'] = 'First name is required to signup';
    } elseif (detectNumber($StudentInfo['first_name'])) {
        $Errors['first_name'] = 'First name cannot contain numbers.';
    } elseif (strlen($StudentInfo['first_name']) <= 1) {
        $Errors['first_name'] = 'First name must be at least 2 characters long.';
    }

    //Special Validation for Middle name
    $StudentInfo['no_middle_name'] = isset($_POST['no-middle-name']) ? true : false; 
    if ($StudentInfo['no_middle_name']) {
        $StudentInfo['middle_name'] = null; // Set to null if no middle name is specified
    } else {
        // Clean and validate the middle name input
        $StudentInfo['middle_name'] = sentenceCase(clean_input($_POST['middle-name']));

        if (!empty($StudentInfo['middle_name'])) {
            $StudentInfo['no_middle_name'] = false;
            if (detectNumber($StudentInfo['middle_name'])) {
                $Errors['middle_name'] = 'Middle name cannot contain numbers.';
            } elseif (strlen($StudentInfo['middle_name']) < 2) {
                $Errors['middle_name'] = 'Middle name must be at least 2 characters long.';
            }
        } else {
            $StudentInfo['no_middle_name'] = true;
        }
    }

    //Validation Last name
    if (empty($StudentInfo['last_name'])) {
        $Errors['last_name'] = 'Last name is required to signup';
    } elseif (detectNumber($StudentInfo['last_name'])) {
        $Errors['last_name'] = 'Last name cannot contain numbers.';
    } elseif (strlen($StudentInfo['last_name']) <= 1) {
        $Errors['last_name'] = 'Last name must be at least 2 characters long.';
    }

    if (empty($StudentInfo['suffix'])) {
        $StudentInfo['suffix'] = null;
    }

    //Validation for college
    if (empty($StudentInfo['college'])) {
        $Errors['college'] = 'College is required to signup';
    }

    if (empty($StudentInfo['course'])) {
        $Errors['course'] = 'Course is required to signup';
    }

    if (empty($StudentInfo['religion'])) {
        $Errors['religion'] = 'Religion is required to signup';
    }

    //Validation Email
    if (empty($StudentInfo['email'])) {
        $Errors['email'] = 'Email is required to signup';
    } elseif (!filter_var($StudentInfo['email'], FILTER_VALIDATE_EMAIL)) {
        $Errors['email'] = 'Please enter a valid email';
    }

    //Validation Password
    if (empty($StudentInfo['password'])) {
        $Errors['password'] = 'Password is required to signup';
    } elseif (strlen($StudentInfo['password']) < 8) {
        $Errors['password'] = 'Enter atleast 8 characters password';
    } elseif (
        !preg_match('/[0-9]/', $password) ||
        !preg_match('/[A-Z]/', $password) ||
        !preg_match('/[a-z]/', $password) ||
        !preg_match('/[^a-zA-Z\d]/', $password)
    ) {
        $Errors['password'] = 'Password must contain at least 1 number, 1 uppercase, 1 lowercase, 1 special';
    } elseif (
        strpos($StudentInfo['password'], $StudentInfo['first_name']) !== false ||
        strpos($StudentInfo['password'], $StudentInfo['middle_name']) !== false ||
        strpos($StudentInfo['password'], $StudentInfo['last_name']) !== false ||
        strpos($StudentInfo['password'], $StudentInfo['email']) !== false ||
        strpos($StudentInfo['password'], $StudentInfo['school_id']) !== false
    ) {
        $Errors['password'] = 'Weak password, please try a different password';
    } elseif (empty($StudentInfo['confirm-password'])) {
        $Errors['confirm_password'] = 'Please confirm your password';
    } elseif ($StudentInfo['confirm-password'] != $StudentInfo['password']) {
        $Errors['confirm_password'] = 'Password does not match!';
    }

    if (empty($Errors)) {
        if($studentObj->verifyStudent($StudentInfo['school_id'], $StudentInfo['first_name'], $StudentInfo['last_name'], $StudentInfo['college'], $StudentInfo['course'])){
            echo "<script type='text/javascript'>alert('Student Exist');</script>";
            header('location: ..\sign_up.php');
        }else{
            echo "<script type='text/javascript'>alert('More To Go');</script>";
            header('location: ..\sign_up.php');
        }
    } else {
        $_SESSION['Errors'] = $Errors;
        $_SESSION['StudentInfo'] = $StudentInfo;
        header('location: ..\sign_up.php');
    }
}