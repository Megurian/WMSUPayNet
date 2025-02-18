<?php

session_start();

if(isset($_SESSION['account'])){
    if ($_SESSION['account']['role'] === 'Student'){
        header("Location: ../student/dashboard.php");
    }
    
    if ($_SESSION['account']['role'] === 'SuperAdmin'){
        header("Location: ../admin/dashboard.php");
    }
    
    if ($_SESSION['account']['role'] === 'CollegeAdmin'){
        header("Location: ../college/dashboard.php");
    }
    
    if ($_SESSION['account']['role'] === 'OrganizationAdmin'){
        header("Location: ../organization/dashboard.php");
    }
} else {
    header("Location: ../login.php");
}

