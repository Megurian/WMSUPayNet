<?php
require_once '../student/includes/head.php';
?>
<?php require_once '../student/includes/topnav.php'; ?>
<body>

    <section class="settings container mt-6">
        <div class="breadcrumb">
        <a href="setting.php" style="padding-right:5px;"><i class="fas fa-arrow-left" style="color: #093909;"></i></a> <span style="padding-left: 5px;">SETTINGS</span> <span>| Account</span>
        </div>

        <div class="account-section">
            <h2>Account Information</h2>
            <div class="account-header p-4 bg-white rounded shadow">
                <form action="#" class="account-form">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" id="name" class="form-control" placeholder="Enter Name" disabled>
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" class="form-control" placeholder="Enter Email" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col">
                            <label for="course" class="form-label">Course:</label>
                            <input type="text" id="course" class="form-control" placeholder="Enter Course" disabled>
                        </div>
                        <div class="col">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" id="username" class="form-control" placeholder="Enter Username" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="college" class="form-label">College:</label>
                            <input type="text" id="college" class="form-control" placeholder="Enter College" disabled>
                        </div>
                    </div>
                    <button type="button" class="btn float-end" style="background-color: #093909; color: white; width: 2in;" onclick="openModal()">Edit</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Edit Modal -->
    <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Account Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <!-- Form fields for editing account info -->
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
                        <!-- Additional fields... -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" style="background-color: #093909; border:#093909;">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for modal functionality
        const modal = new bootstrap.Modal(document.getElementById('editModal'));

        function openModal() {
            modal.show();
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.hide();
            document.body.style.overflow = 'auto';
        }
    </script>
</body>
</html>