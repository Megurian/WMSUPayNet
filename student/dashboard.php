<?php
  session_start();

  if(isset($_SESSION['account'])){    
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CCS PayNet Dashboard</title>
<link rel="stylesheet" href="../student/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<div class="body">
<header>
  <div class="logo">
    <img src="../images/ccs_logo.png" alt="Logo">
    <h1>CCS PayNet</h1>
  </div>
  <div class="icons">
    <div class="notification">
      <a href="./notif.html" class="notif-button">
          <i class="fas fa-bell"></i>
      </a>
    </div>
    <div class="profile">
      <a href="./setting.html" class="profile-button">
        <i class="fas fa-user-circle"></i>
      </a>
    </div>
  </div>
</header>

<div class="dashboard"><div class="main">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Organization</div><br>
        <div class="card-count">4</div>
      </div>
      <div class="card-footer">This week <a href="./org.html">view</a></div>
    </div>
  
    <div class="card">
      <div class="card-header">
        <div class="card-title">Payment <br> Records</div>
        <div class="card-count">0</div>
      </div>
      <div class="card-footer-left">This week <a href="./record.html">view</a></div>
    </div>
  </div>
  
  <div class="help">
    <i class="fas fa-question-circle"></i>
  </div>
</div>
</div>
</body>
</html>
