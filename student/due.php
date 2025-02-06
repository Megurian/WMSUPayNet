<?php
      require_once '../student/includes/head.php';
 ?>
    <style>
        .modal-content {
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
            padding-bottom: 10px;
            text-align: center;
        }

        .modal-title {
            color: #093909;
            margin-bottom: 20px;
        }
    </style>

<body>
    <div class="body">
        <?php 
       require_once '../student/includes/topnav.php';
       ?>
        
        <div class="fee-dashboard">
            <div class="fee-container" style="border: 1px solid #d9d9d9; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-radius: 4px;">
            <div class="fee-card">
            <div class="fee-card-header">
                <div class="back-titles">
                    <a href="./org.php" class="back-bttn">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 style="font-weight: bold;">Venom Publication</h2>
                </div>
            <span class="due-text">Due:</span>
            </div>
            <div class="fee-card-body">
                <table class="due-table table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center" style="background-color: #CC0001; color: white;">Mark</th>
                            <th class="text-center" style="background-color: #CC0001; color: white;">Fee</th>
                            <th class="text-center" style="background-color: #CC0001; color: white;">Status</th>
                            <th class="text-center" style="background-color: #CC0001; color: white;">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><i class="fas fa-exclamation-triangle warning-icon" style="color: #CC0001;"></i></td>
                            <td class="text-center">Venom</td>
                            <td class="text-center">Unpaid</td>
                            <td class="text-center" class="amount">70.00</td>
                        </tr>
                        <tr>
                            <td class="text-center"><i class="fas fa-exclamation-triangle warning-icon" style="color: #CC0001;"></i></td>
                            <td class="text-center">Palaro</td>
                            <td class="text-center">Unpaid</td>
                            <td class="text-center"class="amount">150.00</td>
                        </tr>
                    </tbody>
                </table><br>
                        <div class="due-button d-flex justify-content-between align-items-center">
                            <p class="text-danger">Overdue Payment Notice: <br> Your payment is overdue. Please submit a promissory note to prevent temporary account suspension.</p>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#promissoryModal">Proceed</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Promissory Note Modal -->
    <div class="modal fade" id="promissoryModal" tabindex="-1" aria-labelledby="promissoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="promissoryModalLabel">Promissory Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" placeholder="Type an explanation...." required></textarea>
                    <div class="file-input-container">
                        <label>Attachments:</label>
                        <input type="file" accept=".jpg, .jpeg, .png, .pdf">
                        <i class="fas fa-paperclip"></i>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="closeModal()">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitPromissoryNote()" style="background-color: #093909;">Submit</button>
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

        function submitPromissoryNote() {
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
