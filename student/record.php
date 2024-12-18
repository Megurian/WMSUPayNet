<?php
        require_once '../student/includes/head.php';
?>
<body>
    <div class="body">
        <?php 
       require_once '../student/includes/topnav.php';
       ?>

    <main class="rec-container">
        <div class="back-title">
            <a href="./dashboard.php" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Payment Records</span>
            </a>
        </div>
    
        <div class="student-info">
            <div>
            <label for="student-id">Student ID:</label>
            <input type="text" id="student-id" value="Eh6525417" readonly>
            </div>
            <div>
            <label for="student-name">Student Name:</label>
            <input type="text" id="student-name" value="Juan Dela Cruz" readonly>
            </div>
        </div>
    
        <div class="download-receipt">
            <button class="download-button">
            <i class="fa-solid fa-download"></i> Download Receipt
            </button>
        </div>
    
        <div class="records-grid">
            <div class="record-card">
            <div class="rec-card-header">
                1st Year | 2023-2024 | 1st Sem
            </div>
            <table class="record-table">
                <thead>
                <tr>
                    <th>Organization</th>
                    <th>Fee</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Date Paid</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>CCS-CSC</td>
                    <td>CSC</td>
                    <td>Manual</td>
                    <td>Completed</td>
                    <td>07-29-2025</td>
                    <td class="amount">₱200</td>
                </tr>
                <tr>
                    <td>CCS-CSC</td>
                    <td>Palaro</td>
                    <td>Gcash</td>
                    <td>Completed</td>
                    <td>07-30-2025</td>
                    <td class="amount">₱150</td>
                </tr>
                <tr>
                    <td>PHICS</td>
                    <td>Mem. Fee</td>
                    <td>Maya</td>
                    <td>Completed</td>
                    <td>07-30-2025</td>
                    <td class="amount">₱70</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" class="text-right">Total:</td>
                    <td class="amount">₱420</td>
                </tr>
                </tfoot>
            </table>
            </div>
    
            <!-- Repeat Record Cards -->
            <div class="record-card">
            <div class="rec-card-header">
                1st Year | 2023-2024 | 2nd Sem
            </div>
            <table class="record-table">
                <thead>
                <tr>
                    <th>Organization</th>
                    <th>Fee</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Date Paid</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>CCS-CSC</td>
                    <td>CSC CSC</td>
                    <td>Gcash</td>
                    <td>Completed</td>
                    <td>01-04-2026</td>
                    <td class="amount">₱200</td>
                </tr>
                <tr>
                    <td>CCS-CSC</td>
                    <td>Palaro</td>
                    <td>Gcash</td>
                    <td>Completed</td>
                    <td>01-04-2026</td>
                    <td class="amount">₱150</td>
                </tr>
                <tr>
                    <td>PHICS</td>
                    <td>PSITS</td>
                    <td>Maya</td>
                    <td>Completed</td>
                    <td>01-06-2026</td>
                    <td class="amount">₱70</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="5" class="text-right">Total:</td>
                    <td class="amount">₱420</td>
                </tr>
                </tfoot>
            </table>
            </div>
        </div>
        </main>

    </div>
</body>
</html>