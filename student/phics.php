<?php
    require_once '../student/includes/head.php';
    require_once '../student/includes/topnav.php';
?>
<style>
    .page-content {
        min-height: calc(100vh - 20px); /* Adjust based on your topnav height */
    }
</style>
<body>
    <div class="container-fluid">
        
        <div class="page-content d-flex align-items-center">
            <div class="row justify-content-center w-100">
                <div class="col-md-8">
                    <div class="card shadow-sm">
                        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                            <div class="d-flex align-items-center">
                                <a href="./org.php" class="btn btn-link text-dark p-0 me-3">
                                    <i class="fa-solid fa-arrow-left" style="font-size: 25px;"></i>
                                </a>
                                <h2 class="mb-0 fw-bold">PHICS</h2>
                            </div>
                            <span>Due:</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-white" style="background-color: #093909;">#</th>
                                            <th class="text-center text-white" style="background-color: #093909;">Fee</th>
                                            <th class="text-center text-white" style="background-color: #093909;">Status</th>
                                            <th class="text-center text-white" style="background-color: #093909;">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">Membership Fee</td>
                                            <td class="text-center">Unpaid</td>
                                            <td class="text-center">70.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="text-center">Miscellanious</td>
                                            <td class="text-center">Unpaid</td>
                                            <td class="text-center">150.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
