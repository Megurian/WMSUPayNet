<?php
require_once '../tools/functions.php';
require_once '../database/autoload_classes.php';

$collegeObj = new Colleges();

$accountInfo = $_SESSION['account'];
$collegeInfo = $collegeObj->getCollegeById($_SESSION['account']['college_id']);

?>
<div class="sidebar ">


        <div class="sidebar-heading d-flex align-items-center justify-content-between">
            <img src="<?= $collegeInfo['logo_directory'] ?>" alt="CCS PayNet Logo" width="45" class="rounded-circle">
            <h4 class="ps-1"><span class="green"> <?= $collegeInfo['college_code'] ?> </span> PayNet</h4>
        </div>

        <div class="sidebar-org border-bottom border-top">
            <div class="org flex-column p-2">
                <h6> <?= $collegeInfo['college'] ?> </h6>
            <small class="text-muted"> <?= $accountInfo['email'] ?> </small>
            </div>
        </div>


        <div class="sidebar-item">
            <a href="dashboard" id="dashboard-link" class="nav-link">
                <i class="bi bi-speedometer2"></i>
                 Dashboard
            </a>
        </div>

        <div class="sidebar-item">
            <a href="organizations" id="organizations-link" class="nav-link">
                <i class="fa-solid fa-tent-arrow-left-right"></i>
                Organizations
            </a>
        </div>

        <div class="sidebar-item" >
            <a href="" id="student-link" class="nav-link">
                <i class="fa-solid fa-list"></i>
                Students
            </a>
        </div>

        <div class="sidebar-item">
            <a href="" id="fees-link" class="nav-link">
                <i class="fa-solid fa-table"></i>
                Fees
            </a>
        </div>

        <div class="sidebar-item" >
            <a href="" id="logs-link" class="nav-link">
                <i class="bi bi-clock"></i>
                Logs
            </a>
        </div>

        <div class="sidebar-item" >
            <a href="" id="report-link" class="nav-link">
                <i class="bi bi-flag-fill"></i>
                Report
            </a>
        </div>
    </div>