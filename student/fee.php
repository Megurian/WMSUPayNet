    <?php
        require_once '../student/includes/head.php';
    ?>

    <style>
        .modal {
            display: none;
            margin-top: 25px;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 70px auto;
            padding: 20px 10px 20px 20px;
            border-radius: 10px;
            width: 70%;
            max-width: 450px;
            position: relative;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            background-color: #fff;
            padding-bottom: 10px;
            text-align: center;
        }

        .modal-logo {
            width: 70px;
            height: 70px;
            margin: 0 auto;
            display: block;
        }

        .modal-title {
            text-align: center;
            color: #093909;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #093909;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
        }

        .form-select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            cursor: pointer;
            font-size: 14px;
        }

        .form-select:focus {
            outline: none;
            border-color: #093909;
        }

        .selected-fees {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .fee-item {
            margin: 5px 0;
            padding: 5px;
            border-bottom: 1px solid #eee;
        }

        .modal-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .close-btn, .pay-btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            border: 1px solid #093909;
            cursor: pointer;
            font-weight: bold;
            width: 150px;
        }

        .close-btn {
            background-color: #ffffff;
            color: #093909;
        }

        .pay-btn {
            background-color: #093909;
            color: white;
        }

        .close-btn:hover {
            background-color: #093909;
            color: #ffffff;
        }

        .pay-btn:hover {
            background-color: #ffffff;
            color: #093909;
        }

        /* Custom scrollbar styling */
        .modal-content::-webkit-scrollbar {
            width: 8px;
        }

        .modal-content::-webkit-scrollbar-track {
            background: #ffffff;
            border-radius: 4px;
        }

        .modal-content::-webkit-scrollbar-thumb {
            background: #ffffff;
            border-radius: 4px;
        }

        .modal-content::-webkit-scrollbar-thumb:hover {
            background: #072907;
        }
        .profile-image-container {
            width: 60px;
            height: 60px;
            margin: 5px 0;
            border-radius: 4px;
            overflow: hidden;
            border: 1px solid #ddd;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .profile-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .payment-boxes {
            display: flex;
            gap: 15px;
        }

        .payment-box {
            width: 60px;
            height: 60px;
            border-radius: 4px;
            overflow: hidden;
            border: 1px solid #ddd;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: border-color 0.2s ease;
        }

        .payment-box:hover {
            border-color: #093909;
        }

        .payment-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

<body>
    <div class="body">
       <?php 
       require_once '../student/includes/topnav.php';
       ?>
        
        <div class="fee-dashboard">
            <div class="fee-container">
                <div class="fee-card">
                    <div class="fee-card-header">
                        <div class="back-titles">
                            <a href="./org.php" class="back-bttn">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>
                            <h2>CCS-CSC</h2>
                        </div>
                    <span class="due-text">Due:</span>
                </div>
            <div class="fee-card-body">
                <table class="fees-table">
                    <thead>
                        <tr>
                            <th>Fee</th>
                            <th>Status</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                        <tbody>
                            <tr>
                                <td>CSC</td>
                                <td>Unpaid</td>
                                <td class="amount">200.00</td>
                            </tr>
                            <tr>
                                <td>Palaro</td>
                                <td>Unpaid</td>
                                <td class="amount">150.00</td>
                            </tr>
                        </tbody>
                    </table><br>
                        <div class="proceed-button">
                            <button onclick="openModal()">Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Transaction Detail Modal -->
    <div id="transactionModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <img src="../images/ccs_logo.png" alt="Logo" class="modal-logo">
            </div>
    
            <h2 class="modal-title">Transaction Detail</h2>
            <div class="modal-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="name" value="Juan Dela Cruz" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" value="Eh6525417@wmsu.edu.ph" readonly>
                </div>
                <div class="form-group">
                    <label>Semester</label>
                    <select id="semester" class="form-select">
                        <option value="1st">1st</option>
                        <option value="2nd" selected>2nd</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Year Level</label>
                    <select id="yearLevel" class="form-select">
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd" selected>3rd</option>
                        <option value="4th">4th</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>School Year</label>
                    <input type="text" id="schoolYear" value="2023-2024" readonly>
                </div>
                <div class="form-group">
                    <label>Payment Method</label>
                    <div class="payment-boxes">
                        <div class="payment-box">
                            <img src="../images/GCash_Logo.png" alt="GCash Payment" class="payment-image">
                        </div>
                        <div class="payment-box">
                            <img src="../images/PayPal_logo.png" alt="Maya Payment" class="payment-image">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fees</label>
                    <div id="selectedFees" class="selected-fees">
                        <div class="fee-item">CSC - ₱200.00</div>
                        <div class="fee-item">Palaro - ₱150.00</div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Total Amount</label>
                    <input type="text" id="totalAmount" value="₱350.00" readonly>
                </div>
                <div class="modal-buttons">
                    <button class="close-btn" onclick="closeModal()">Close</button>
                    <button class="pay-btn" onclick="window.location.href='payment.php'">Proceed</button>
                </div>
            </div>
        </div>
    </div>

    

    <script>
        function openModal() {
            document.getElementById("transactionModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("transactionModal").style.display = "none";
        }

        // Close modal when clicking outside of it
        window.onclick = function(event) {
            var modal = document.getElementById("transactionModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
