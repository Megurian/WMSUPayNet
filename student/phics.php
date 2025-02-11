<?php
    require_once '../student/includes/head.php';
    require_once '../student/includes/topnav.php';
?>
<body>
    <div class="body">
        
        <div class="fee-dashboard">
            <div class="container" style="border: 1px solid #d9d9d9; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-radius: 4px;">
                <div class="fee-card">
                    <div class="fee-card-header">
                        <div class="back-titles">
                            <a href="./org.php" class="back-bttn">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                            <h2 style="font-weight: bold;">PHICS</h2>
                        </div>
                    <span class="due-text">Due:</span>
                </div>
            <div class="fee-card-body">
                <table class="table table-striped">
                    <thead style="background-color: #093909; color: white;">
                        <tr>
                            <th class="text-center" scope="col" style="background-color: #093909; color: white;">#</th>
                            <th class="text-center" scope="col" style="background-color: #093909; color: white;">Fee</th>
                            <th class="text-center" scope="col" style="background-color: #093909; color: white;">Status</th>
                            <th class="text-center" scope="col" style="background-color: #093909; color: white;">Amount</th>
                        </tr>
                    </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Membership Fee</td>
                                <td class="text-center">Unpaid</td>
                                <td class="text-center amount">70.00</td>
                            </tr>
                            <tr>
                                <td class="text-center">2</td>
                                <td class="text-center">Miscellanious</td>
                                <td class="text-center">Unpaid</td>
                                <td class="text-center amount">150.00</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
