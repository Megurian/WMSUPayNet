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
<?php
      require_once '../student/includes/head.php';
 ?>
 <style>
  .card {
    flex: 1;
    background-color: #093909;
    color: #ffffff;
    padding: 20px;
    border-radius: 8px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 150px;
    }

    .card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    }

    .card-title {
    font-size: 36px;
    font-weight: bold;
    text-align: left;
    }

    .card-count {

    font-size: 40px;
    font-weight: bold;
    text-align: right;
    }

    .card-footer {
    font-size: 14px;
    text-align: left;
    margin-top: 10px;
    }

    .card-footer a {
    color: #ffffff;
    text-decoration: none;
    float: right;
    font-weight: bold;
    }

    .card-footer-left {
    font-size: 14px;
    text-align: left;
    margin-top: 10px;
    }

    .card-footer-left a {
    color: #093909;
    text-decoration: none;
    float: right;
    font-weight: bold;
    }
 </style>
<body>

<div class="body">
       
       <?php 
       require_once '../student/includes/topnav.php';
       ?>

<div class="dashboard">
  <div class="main">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Organization</div><br>
        <div class="card-count">4</div>
      </div>
      <div class="card-footer">This week <a href="./org.php">view</a></div>
    </div>
  
    <div class="card" style="background-color: #ffffff; color: #093909; border: 1px solid #093909;">
      <div class="card-header">
        <div class="card-title">Payment <br> Records</div>
        <div class="card-count">0</div>
      </div>
      <div class="card-footer-left">This week <a href="./record.php">view</a></div>
    </div>
  </div>
  
  <div class="help">
    <i class="fas fa-question-circle"></i>
  </div>
</div>
</div>
</body>
</html>
