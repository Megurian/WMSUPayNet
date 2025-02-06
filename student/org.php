<?php 
require_once '../student/includes/head.php';
?>
<body>
    <!-- Header -->
    <?php require_once '../student/includes/topnav.php'; ?>

    <!-- Back Button and Page Title -->
    <section class="container">
        <div class="breadcrumb">
            <div class="d-flex align-items-center mb-3">
                <a href="dashboard.php" class="btn btn-link" style="padding-right:5px;"><i class="fas fa-arrow-left" style="color: #093909; font-size: 24px"></i></a> <h2 class="ms-2" style="padding-left: 5px;">Organizations</h2>
            </div>
        </div>

        <!-- Cards Section -->
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-3 mb-4">
                <div class="card text-center shadow" style="height: 170px;">
                    <div class="card-header">
                        <div class="d-flex align-items-center" style="height: 60px;">
                            <h6 class="card-title" style="font-size: 1.3rem; font-weight: bold;">GENDER <br> CLUB</h6>
                            <h1 class="card-count ms-auto" style="font-size: 2rem;">1</h1>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="status pending" style="font-size: 0.9rem;">Pending</span>
                            <a href="#" class="btn btn-link" style="font-size: 0.9rem; text-decoration: none; color: #093909;">view</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-3 mb-4">
                <div class="card text-center shadow" style="height: 170px;">
                    <div class="card-header">
                        <div class="d-flex align-items-center" style="height: 60px;">
                            <h6 class="card-title" style="font-size: 1.3rem; font-weight: bold;">CCS-CSC</h6>
                            <h1 class="card-count ms-auto" style="font-size: 2rem;">2</h1>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="status pending" style="font-size: 0.9rem;">Pending</span>
                            <a href="fee.php" class="btn btn-link" style="font-size: 0.9rem; text-decoration: none; color: #093909;">view</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-3 mb-4">
                <div class="card text-center shadow" style="height: 170px;">
                    <div class="card-header">
                        <div class="d-flex align-items-center" style="height: 60px;">
                            <h6 class="card-title" style="font-size: 1.3rem; font-weight: bold;">PHICS</h6>
                            <h1 class="card-count ms-auto" style="font-size: 2rem;">1</h1>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="status success" style="font-size: 0.9rem;">Success</span>
                            <a href="#" class="btn btn-link" style="font-size: 0.9rem; text-decoration: none; color: #093909;">view</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-3 mb-4">
                <div class="card text-center shadow" style="height: 170px;">
                    <div class="card-header">
                        <div class="d-flex align-items-center" style="height: 60px;">
                            <h6 class="card-title" style="font-size: 1.3rem; font-weight: bold;">VENOM <br> PUBLICATION</h6>
                            <h1 class="card-count ms-auto" style="font-size: 2rem;">1</h1>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="status due" style="font-size: 0.9rem; color: #CC0001;">Due</span>
                            <a href="due.php" class="btn btn-link" style="font-size: 0.9rem; text-decoration: none; color: #093909;">view</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>