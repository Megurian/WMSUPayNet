<?php
        require_once '../student/includes/head.php';
        require_once '../student/includes/topnav.php';
    ?>
<body>
    <div class="body" >


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm" style="border: 1px solid #d9d9d9;">
                    <div class="card-body p-4" >
                        <div class="d-flex align-items-center mb-4">
                            <a href="./dashboard.php" class="text-dark me-3">
                                <i class="fa-solid fa-arrow-left" style="font-size: 24px"></i>
                            </a>
                            <h2 class="mb-0" style="color: #093909;">Settings</h2>
                        </div>

                        <section class="mb-4">
                            <h2 class="h5 mb-3" style="color: #093909;">Account</h2>
                            <div class="list-group">
                                <a href="./Accview.php" class="list-group-item list-group-item-action d-flex align-items-center border-0 mb-2 shadow-sm">
                                    <i class="fas fa-user me-3" style="color: #093909;"></i>
                                    Account Information
                                </a>
                                <a href="./password.php" class="list-group-item list-group-item-action d-flex align-items-center border-0 mb-2 shadow-sm">
                                    <i class="fas fa-key me-3" style="color: #093909;"></i>
                                    Change Password
                                </a>
                            </div>
                        </section>

                        <section>
                            <h2 class="h5 mb-3" style="color: #093909;">Support & Report</h2>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center border-0 mb-2 shadow-sm">
                                    <i class="fas fa-comment-dots me-3" style="color: #093909;"></i>
                                    Feedback
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center border-0 mb-2 shadow-sm">
                                    <i class="fas fa-question-circle me-3" style="color: #093909;"></i>
                                    Help Center
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center border-0 mb-2 shadow-sm">
                                    <i class="fas fa-shield-alt me-3" style="color: #093909;"></i>
                                    Safety & Privacy Center
                                </a>
                                <a href="./report.php" class="list-group-item list-group-item-action d-flex align-items-center border-0 mb-2 shadow-sm">
                                    <i class="fas fa-exclamation-triangle me-3" style="color: #093909;"></i>
                                    Report A Problem
                                </a>
                            </div>
                        </section>

                        <div class="text-center mt-4 pt-3 border-top">
                            <a href="../account/logout.php" class="btn btn-outline-success d-flex align-items-center justify-content-center mx-auto" style="max-width: 200px; background-color: #093909; color: white; border-color: #093909;">
                                <i class="fas fa-sign-out-alt me-2"></i>
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
