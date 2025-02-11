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
    <div class="container-fluid mt-6 d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="row"> <!-- Start of the row for cards -->
            <!-- Card 1 -->
            <div class="col-md-6 mb-4"> 
                <div class="card text-center shadow" style="background-color:#093909;">
                    <div class="card-header">
                        <div class="d-flex align-items-center" >
                            <h6 class="card-title text-white" style="font-size: 2rem; font-weight: bold;">Organizations</h6>
                            <h1 class="card-count ms-auto" style="font-size: 2rem; color: white;">4</h1>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="status semester" style="font-size: 1rem; color: white;"> This Semester</span>
                            <a href="#" class="btn btn-link" style="font-size: 1rem; text-decoration: none; color: white;">view</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-6 mb-4"> 
                <div class="card text-center shadow" style="background-color:#093909">
                    <div class="card-header">
                        <div class="d-flex align-items-center" >
                            <h6 class="card-title text-white" style="font-size: 2rem; font-weight: bold;">Organizations</h6>
                            <h1 class="card-count ms-auto" style="font-size: 2rem; color: white;">4</h1>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="status semester" style="font-size: 1rem; color: white;"> This Semester</span>
                            <a href="#" class="btn btn-link" style="font-size: 1rem; text-decoration: none; color: white;">view</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div> <!-- End of the row for cards -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
