<?php
require_once '../student/includes/head.php';
require_once '../student/includes/topnav.php'; 
?>
<body>
 <div class="body" style="margin-top: 100px;" >
    <section class="settings container mt-6">
        <div class="breadcrumb">
            <div class="d-flex align-items-center mb-3">
                <a href="setting.php" class="btn btn-link p-0"><i class="fas fa-arrow-left" style="color: #093909; font-size: 20px;"></i></a>
                <span class="ms-2" style="color: #093909;">SETTINGS | Account</span>
            </div>
        </div>

        <div class="account-section">
            <h2>Account Information</h2>
            <div class="account-header p-4 bg-white rounded shadow">
                <form action="#" class="account-form">
                    <div class="row mb-3">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter Name" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" class="form-control" placeholder="Enter Email" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <label for="course" class="form-label">Course:</label>
                            <input type="text" id="course" class="form-control" placeholder="Enter Course" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" id="username" class="form-control" placeholder="Enter Username" disabled>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 col-md-6">
                            <label for="college" class="form-label">College:</label>
                            <input type="text" id="college" class="form-control" placeholder="Enter College" disabled>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn" style="background-color: #093909; color: white; min-width: 120px; padding: 8px 24px;" onclick="openModal()">
                            <i class="fas fa-edit me-2"></i>Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Edit Modal -->
    <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Account Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" id="Name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="course" class="form-label">Course</label>
                            <select id="course" class="form-select" required>
                                <option value="">Select Course</option>
                                <option value="BSCS">Bachelor of Science in Computer Science</option>
                                <option value="BSIT">Bachelor of Science in Information Technology</option>
                                <option value="BSIS">Bachelor of Science in Information Systems</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="college" class="form-label">College</label>
                            <select id="college" class="form-select" required>
                                <option value="">Select College</option>
                                <option value="CCS">College of Computing Studies</option>
                                <option value="CBA">College of Business Administration</option>
                                <option value="COE">College of Engineering</option>
                                <option value="CED">College of Education</option>
                                <option value="CLA">College of Liberal Arts</option>
                            </select>
                        </div>
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-secondary" style="min-width: 100px;" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn" style="background-color: #093909; color: white; min-width: 100px;">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        // JavaScript for modal functionality
        function openModal() {
            var modal = new bootstrap.Modal(document.getElementById('editModal'));
            modal.show();
        }
    </script>
</body>
</html>