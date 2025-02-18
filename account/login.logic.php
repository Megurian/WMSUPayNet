<?php
require_once '../tools/functions.php';
require_once '../database/autoload_classes.php';

session_start();

$studentObj = new Students();
$accountObj = new Accounts();


$LoginInfo = [];
$Errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $LoginInfo['email'] = clean_input($_POST['email']);
    } else {
        $LoginInfo['username'] = strtoupper(clean_input($_POST['email']));
    }

    $LoginInfo['password'] = clean_input($_POST['password']);

    if($accountObj->userLogin($LoginInfo['email'], $LoginInfo['username'], $LoginInfo['password'])) {
        $data = $accountObj->fetchUser($LoginInfo['email'], $LoginInfo['username']);
        $_SESSION['account'] = $data;
        header("Location: ../tools/authorization.php");
        
    } else {
        $Errors['loginError'] = "Invalid username/password";
        $_SESSION['Errors'] = $Errors;
        $_SESSION['LoginInfo'] = $LoginInfo;
        header("Location: ../login.php");
    }
}