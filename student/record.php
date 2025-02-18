<?php
        require_once '../student/includes/head.php';
        require_once '../student/includes/topnav.php';
?>
<body>
    <div class="body">

    <main class="container mt-5">
        <div class="d-flex align-items-center mb-4">
            <a href="./dashboard.php" class="text-decoration-none">
                <i class="fa-solid fa-arrow-left me-2" style="font-size: 24px; color: #093909;"></i>
                <span class="h5 mb-0" style="color: #093909;">Payment Records</span>
            </a>
        </div>
    
        <div class="card mb-4" style="border: 1px solid #d9d9d9;">
            <div class="card-body p-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-group text-center">
                            <label for="student-id" class="form-label" style="color: #093909;">Student ID:</label>
                            <input type="text" id="student-id" class="form-control text-center" value="Eh6525417" readonly style="border: 1px solid #d9d9d9; background-color: #fff;">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center">
                            <label for="student-name" class="form-label" style="color: #093909;">Student Name:</label>
                            <input type="text" id="student-name" class="form-control text-center" value="Juan Dela Cruz" readonly style="border: 1px solid #d9d9d9; background-color: #fff;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mb-4">
            <button class="btn" style="border: 1px solid #093909; color: #093909;">
                <i class="fa-solid fa-download me-2"></i> Download Receipt
            </button>
        </div>
    
        <div class="row g-4">
            <!-- First Semester Card -->
            <div class="col-md-6">
                <div class="card h-100" style="border: 1px solid #d9d9d9;">
                    <div class="card-header py-3 text-center" style="background-color: white; border-bottom: 1px solid #d9d9d9;">
                        <h6 class="mb-0" style="color: #093909; font-weight: bold;">1st Year | 2023-2024 | 1st Sem</h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="background-color: #093909; color: white;">Organization</th>
                                        <th class="text-center" style="background-color: #093909; color: white;">Fee</th>
                                        <th class="text-center" style="background-color: #093909; color: white;">Status</th>
                                        <th class="text-center" style="background-color: #093909; color: white;">Date Paid</th>
                                        <th class="text-center" style="background-color: #093909; color: white;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">CCS-CSC</td>
                                        <td class="text-center">CSC</td>
                                        <td class="text-center">Unpaid</td>
                                        <td class="text-center">07-29-2025</td>
                                        <td class="text-center">₱200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">CCS-CSC</td>
                                        <td class="text-center">Palaro</td>
                                        <td class="text-center">Completed</td>
                                        <td class="text-center">07-30-2025</td>
                                        <td class="text-center">₱150</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">PHICS</td>
                                        <td class="text-center">Mem. Fee</td>
                                        <td class="text-center">Completed</td>
                                        <td class="text-center">07-30-2025</td>
                                        <td class="text-center">₱70</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end pe-3" style="font-weight: bold;">Total:</td>
                                        <td class="text-center" style="font-weight: bold;">₱420</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Semester Card -->
            <div class="col-md-6">
                <div class="card h-100" style="border: 1px solid #d9d9d9;">
                    <div class="card-header py-3 text-center" style="background-color: white; border-bottom: 1px solid #d9d9d9;">
                        <h6 class="mb-0" style="color: #093909; font-weight: bold;">1st Year | 2023-2024 | 2nd Sem</h6>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="background-color: #093909; color: white;">Organization</th>
                                        <th class="text-center" style="background-color: #093909; color: white;">Fee</th>
                                        <th class="text-center" style="background-color: #093909; color: white;">Status</th>
                                        <th class="text-center" style="background-color: #093909; color: white;">Date Paid</th>
                                        <th class="text-center" style="background-color: #093909; color: white;">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">CCS-CSC</td>
                                        <td class="text-center">CSC CSC</td>
                                        <td class="text-center">Unpaid</td>
                                        <td class="text-center">01-04-2026</td>
                                        <td class="text-center">₱200</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">CCS-CSC</td>
                                        <td class="text-center">Palaro</td>
                                        <td class="text-center">Completed</td>
                                        <td class="text-center">01-04-2026</td>
                                        <td class="text-center">₱150</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">PHICS</td>
                                        <td class="text-center">PSITS</td>
                                        <td class="text-center">Completed</td>
                                        <td class="text-center">01-06-2026</td>
                                        <td class="text-center">₱70</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end pe-3" style="font-weight: bold;">Total:</td>
                                        <td class="text-center" style="font-weight: bold;">₱420</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    </div>
</body>
</html>