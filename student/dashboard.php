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
require_once '../student/includes/topnav.php';
?>

<style>
.custom-bg-green {
  background-color: #093909 !important;
}
.custom-text-green {
  color: #093909 !important;
}
.custom-border-green {
  border-color: #093909 !important;
}
.page-content {
  min-height: calc(100vh - 180px);
  display: flex;
  align-items: center;
  margin-top: 50px;
}
</style>

<div class="page-content">
<div class="container mt-5 pt-5">
  <div class="row justify-content-center">
      <div class="col-md-4 mb-4">
          <div class="card custom-bg-green text-white h-100 shadow" style="min-height: 140px;">
              <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                      <h3 class="card-title h4 mb-0" style="font-size: 2rem; font-weight: bold;">Organization</h3>
                      <h2 class="h1 mb-0">4</h2>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-4">
                      <span class="small">This week</span>
                      <a href="./org.php" class="text-white text-decoration-none fw-bold small">view</a>
                  </div>
              </div>
          </div>
      </div>
      
      <div class="col-md-4 mb-4">
          <div class="card border custom-border-green h-100 shadow" style="min-height: 140px;">
              <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                      <h3 class="card-title h4 mb-0 custom-text-green" style="font-size: 2rem; font-weight: bold;">Payment Records</h3>
                      <h2 class="h1 mb-0 custom-text-green">0</h2>
                  </div>
                  <div class="d-flex justify-content-between align-items-center mt-4">
                      <span class="text-muted small">This week</span>
                      <a href="./record.php" class="custom-text-green text-decoration-none fw-bold small">view</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
</div>

<div class="position-fixed bottom-0 end-0 p-3">
<button class="btn custom-bg-green text-white rounded-circle shadow-lg" style="width: 45px; height: 45px;">
  <i class="fas fa-question-circle"></i>
</button>
</div>
</body>
</html>