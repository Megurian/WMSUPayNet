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
            margin: 150px auto;
            padding: 20px;
            border-radius: 10px;
            width: 70%;
            max-width: 380px;
            position: relative;
            max-height: 80vh;
            overflow-y: auto;
            border: 1px solid #093909;
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

        .modal-body textarea {
            width: 100%;
            height: 150px;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            resize: none;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .modal-body textarea:focus {
            outline: none;
            border-color: #093909;
        }

        .file-input-container {
            position: relative;
            margin-bottom: 20px;
        }

        .file-input-container input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
        }

        .file-input-container i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #093909;
        }

        .modal-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .close-btn, .submit-btn {
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

        .submit-btn {
            background-color: #093909;
            color: white;
        }

        .close-btn:hover {
            background-color: #093909;
            color: #ffffff;
        }

        .submit-btn:hover {
            background-color: #ffffff;
            color: #093909;
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
                    <h2>Venom Publication</h2>
                </div>
            <span class="due-text">Due:</span>
            </div>
            <div class="fee-card-body">
            <table class="due-table">
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
            <td><i class="fas fa-exclamation-triangle warning-icon"></i></td>
            <td>Venom</td>
            <td>Unpaid</td>
            <td class="amount">70.00</td>
            </tr>
            <tr>
            <td><i class="fas fa-exclamation-triangle warning-icon"></i></td>
            <td>Palaro</td>
            <td>Unpaid</td>
            <td class="amount">150.00</td>
            </tr>
            </tbody>
            </table><br>
            <div class="due-button">
                <p>Overdue Payment Notice: <br> Your payment is overdue. Please submit a promissory note to prevent temporary account suspension.</p>
                <button onclick="openModal()">Proceed</button>
            </div>
            </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Promissory Note Modal -->
    <div id="promissoryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <img src="../images/ccs_logo.png" alt="Logo" class="modal-logo">
            </div>
            <h2 class="modal-title">Promissory Note</h2>
            <div class="modal-body">
                <textarea placeholder="Type an explanation...." required></textarea>
                <div class="file-input-container">
                    <label>Attachments:</label>
                    <input type="file" accept=".jpg, .jpeg, .png, .pdf">
                    <i class="fas fa-paperclip"></i>
                </div>
                <div class="modal-buttons">
                    <button class="close-btn" onclick="closeModal()">Close</button>
                    <button class="submit-btn" onclick="submitForm()">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById("promissoryModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("promissoryModal").style.display = "none";
        }

        function submitForm() {
            // Add your form submission logic here
            alert("Promissory note submitted successfully!");
            closeModal();
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            var modal = document.getElementById("promissoryModal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
