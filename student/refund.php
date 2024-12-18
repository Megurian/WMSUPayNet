    <?php
        require_once '../student/includes/head.php';
    ?>
    <style>
        .modal {
            display: none;
            margin-top: 50px;
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
            margin: 50px auto;
            padding: 10px 5px 10px 10px;
            width: 90%;
            max-width: 500px;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            max-height: 80vh;
        }

        .modal-header {
            padding: 15px 20px;
            background-color: #fff;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            margin: 0;
            font-size: 18px;
            color: #000;
        }

        .close {
            color: #000;
            font-size: 24px;
            font-weight: bold;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            margin-left: auto;
        }

        .modal-body {
            padding: 20px 15px 20px 20px;
            overflow-y: auto;
            max-height: calc(80vh - 60px); /* Subtract header height */
        }

        .refund-details {
            margin-bottom: 25px;
        }

        .refund-details h3 {
            font-size: 16px;
            margin-bottom: 10px;
            color: #000;
        }

        .refund-details p {
            margin: 5px 0;
            color: #333;
            font-size: 14px;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: normal;
            color: #000;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-row .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-control:focus {
            outline: none;
            border-color: #666;
        }

        .dropdown {
            position: relative;
            width: 100%;
        }

        .dropdown-toggle {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fff;
            text-align: left;
            position: relative;
            cursor: pointer;
            font-size: 14px;
        }

        .dropdown-toggle::after {
            content: '';
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #666;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 2px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            z-index: 1000;
            max-height: 200px;
            overflow-y: auto;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            padding: 8px 12px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        .other-reasons {
            margin-top: 10px;
        }

        .other-reasons input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .attachment-container {
            position: relative;
            margin-top: 20px;
        }

        .attachment-input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: flex;
            align-items: center;
        }

        .attachment-input input[type="file"] {
            display: none;
        }

        .attachment-input label {
            flex-grow: 1;
            margin: 0;
            cursor: pointer;
        }

        .attachment-icon {
            padding: 8px;
            color: #000;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #093909;
            color: #ffffff;
            border: 1px solid #093909;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background-color: #ffffff;
            color: #093909;
        }

        /* Custom scrollbar styling */
        .modal-body::-webkit-scrollbar {
            width: 8px;
        }

        .modal-body::-webkit-scrollbar-track {
            background: #ffffff;
            border-radius: 4px;
        }

        .modal-body::-webkit-scrollbar-thumb {
            background: #ffffff;
            border-radius: 4px;
        }

        .modal-body::-webkit-scrollbar-thumb:hover {
            background: #ccc;
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
                            <h2>PHICS</h2>
                        </div>
                        <span class="due-text">Due:</span>
                    </div>
                    <div class="fee-card-body">
                        <table class="fees-table">
                            <thead>
                                <tr>
                                    <th>Mark</th>
                                    <th>Fee</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="mark" id="mark"></td>
                                    <td>Membership Fee</td>
                                    <td>Paid</td>
                                    <td class="amount">100.00</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="mark" id="mark"></td>
                                    <td>Department Shirt</td>
                                    <td>Paid</td>
                                    <td class="amount">400.00</td>
                                </tr>
                            </tbody>
                        </table><br>
                        <div class="refund-btn">
                            <p>Refund Notice:
                            Refund requests must be submitted within the payment week. Once the system goes offline, refunds will no longer be available.</p>
                            <button onclick="openModal()">Request Refund</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Refund Request Modal -->
    <div id="refundModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Request Form</h2>
                <button class="close" onclick="closeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <div class="refund-details">
                    <h3>Refund Details</h3>
                    <p>This form allows you to request a refund for a payment you have made.</p>
                    <p>Please note that refund requests must be submitted by November 30, 2024.</p>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>GCash Name</label>
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label>GCash Number</label>
                        <input type="text" class="form-control" placeholder="Number">
                    </div>
                </div>

                <div class="form-group">
                    <label>Reason for Refund</label>
                    <div class="dropdown">
                        <button type="button" class="dropdown-toggle" id="reasonDropdown">
                            Select a reason
                        </button>
                        <div class="dropdown-menu" id="reasonMenu">
                            <div class="dropdown-item" onclick="selectReason('Course Withdrawal')">Course Withdrawal</div>
                            <div class="dropdown-item" onclick="selectReason('Course Cancellation')">Course Cancellation</div>
                            <div class="dropdown-item" onclick="selectReason('Double Payment')">Double Payment</div>
                            <div class="dropdown-item" onclick="selectReason('Incorrect Payment')">Incorrect Payment</div>
                            <div class="dropdown-item" onclick="selectReason('Insufficient Enrollment')">Insufficient Enrollment</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Other Reasons:</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label>Attachments</label>
                    <div class="attachment-input">
                        <input type="file" id="attachment" accept=".jpg, .jpeg, .png, .pdf">
                        <label for="attachment">Choose file</label>
                        <i class="fas fa-paperclip attachment-icon"></i>
                    </div>
                </div>

                <button class="submit-btn">Submit</button>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("refundModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("refundModal").style.display = "none";
            // Close dropdown if open when closing modal
            document.getElementById("reasonMenu").classList.remove("show");
        }

        // Get the dropdown elements
        const dropdown = document.getElementById("reasonDropdown");
        const dropdownMenu = document.getElementById("reasonMenu");

        // Toggle dropdown on button click
        dropdown.addEventListener("click", function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle("show");
        });

        function selectReason(reason) {
            dropdown.textContent = reason;
            dropdownMenu.classList.remove("show");
        }

        // Close dropdown when clicking outside
        document.addEventListener("click", function(e) {
            if (!dropdown.contains(e.target)) {
                dropdownMenu.classList.remove("show");
            }
        });

        // Close modal when clicking outside
        window.onclick = function(event) {
            var modal = document.getElementById("refundModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
