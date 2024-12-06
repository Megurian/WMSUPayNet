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
<body>

<div class="body">
       
       <?php 
       require_once '../student/includes/topnav.php';
       ?>

<div class="dashboard"><div class="main">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Organization</div><br>
        <div class="card-count">4</div>
      </div>
      <div class="card-footer">This week <a href="./org.php">view</a></div>
    </div>
  
    <div class="card">
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
