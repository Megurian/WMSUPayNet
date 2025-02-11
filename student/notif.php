<?php
        require_once '../student/includes/head.php';
        require_once '../student/includes/topnav.php';
?>
<body>
    <div class="body">

        <main class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Header Section -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center">
                            <a href="./dashboard.php" class="text-decoration-none me-3">
                                <i class="fa-solid fa-arrow-left" style="font-size: 24px; color: #093909;"></i>
                            </a>
                            <h2 class="mb-0" style="color: #093909;">Notifications</h2>
                        </div>
                        <button class="btn" style="border: 1px solid #093909; color: #093909;">
                            <i class="fas fa-check-circle me-2"></i>Mark All as Read
                        </button>
                    </div>

                    <!-- Notifications List -->
                    <div class="card" style="border: 1px solid #d9d9d9;">
                        <ul class="list-group list-group-flush">
                            <!-- Notification Items -->
                            <li class="list-group-item p-3">
                                <div class="d-flex flex-column">
                                    <p class="mb-2">
                                        <i class="fas fa-info-circle me-2" style="color: #093909;"></i>
                                        You have an upcoming organization fee due
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="far fa-clock me-1"></i>
                                            3 days 17 hours ago
                                        </small>
                                        <a href="#" class="text-decoration-none" style="color: #093909;">View full notification</a>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item p-3">
                                <div class="d-flex flex-column">
                                    <p class="mb-2">
                                        <i class="fas fa-check-circle me-2" style="color: #28a745;"></i>
                                        Promissory Note Accepted
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="far fa-clock me-1"></i>
                                            3 days 17 hours ago
                                        </small>
                                        <a href="#" class="text-decoration-none" style="color: #093909;">View full notification</a>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item p-3">
                                <div class="d-flex flex-column">
                                    <p class="mb-2">
                                        <i class="fas fa-times-circle me-2" style="color: #dc3545;"></i>
                                        Promissory Note Rejected
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="far fa-clock me-1"></i>
                                            3 days 17 hours ago
                                        </small>
                                        <a href="#" class="text-decoration-none" style="color: #093909;">View full notification</a>
                                    </div>
                                </div>
                            </li>

                            <li class="list-group-item p-3">
                                <div class="d-flex flex-column">
                                    <p class="mb-2">
                                        <i class="fas fa-info-circle me-2" style="color: #093909;"></i>
                                        You have an upcoming organization fee due
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">
                                            <i class="far fa-clock me-1"></i>
                                            3 days 17 hours ago
                                        </small>
                                        <a href="#" class="text-decoration-none" style="color: #093909;">View full notification</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Help Button -->
                    <div class="position-fixed bottom-0 end-0 p-4">
                        <button class="btn btn-lg rounded-circle shadow-sm" style="background-color: #093909; color: white; width: 50px; height: 50px;">
                            <i class="fas fa-question"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
