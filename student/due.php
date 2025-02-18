<?php
      require_once '../student/includes/head.php';
      require_once '../student/includes/topnav.php';
 ?>
<style>
    .bg-custom-red {
        background-color: #CC0001 !important;
    }
    .text-custom-red {
        color: #CC0001 !important;
    }
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
                                <h2 class="mb-0 fw-bold">Venom Publication</h2>
                            </div>
                            <span>Due:</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th class="text-center bg-custom-red text-white">Mark</th>
                                            <th class="text-center bg-custom-red text-white">Fee</th>
                                            <th class="text-center bg-custom-red text-white">Status</th>
                                            <th class="text-center bg-custom-red text-white">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center"><i class="fas fa-exclamation-triangle text-custom-red"></i></td>
                                            <td class="text-center">Venom</td>
                                            <td class="text-center">Unpaid</td>
                                            <td class="text-center">70.00</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center"><i class="fas fa-exclamation-triangle text-custom-red"></i></td>
                                            <td class="text-center">Palaro</td>
                                            <td class="text-center">Unpaid</td>
                                            <td class="text-center">150.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="alert alert-danger mb-0 p-3">
                                        <p class="mb-0">Overdue Payment Notice: <br> Your payment is overdue. Please submit a promissory note to prevent temporary account suspension.</p>
                                    </div>
                                    <button class="btn bg-custom-red text-white ms-3" data-bs-toggle="modal" data-bs-target="#promissoryModal" style="margin-top: 20px;">Proceed</button>
                                </div>
                            </div>
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
                <div class="modal-header border-bottom">
                    <h5 class="modal-title fw-bold" id="promissoryModalLabel">Promissory Note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <textarea class="form-control" rows="4" placeholder="Type an explanation...." required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attachments:</label>
                        <div class="input-group">
                            <input type="file" class="form-control" accept=".jpg, .jpeg, .png, .pdf">
                            <span class="input-group-text"><i class="fas fa-paperclip"></i></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn bg-custom-red text-white">Submit</button>
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
