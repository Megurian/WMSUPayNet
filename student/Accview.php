<?php
      require_once '../student/includes/head.php';
 ?>
    <style>
        .account-header {
            padding: 40px 20px 20px 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            width: 100%;
            height: 48vh;
        }

        .account-section {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px 20px 20px 30px;
            max-width: 1250px;
            margin: 0 auto;
            position: relative;
            height: 60vh;
        }
         
        .form-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
        }

        .input-group label {
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }

        .input-group input {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .input-group input:disabled {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }

        .edit-btn {
            background-color: #093909;
            color: #fff;
            padding: 10px 24px;
            border: 1px solid #093909;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
            
        }

        .edit-btn:hover {
            background-color: #ffffff;
            color: #093909;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            overflow-y: auto;
        }

        .modal-content {
            background-color: #fff;
            margin: 150px auto;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 600px;
            position: relative;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }

        .close:hover {
            color: #333;
        }

        .modal-title {
            color: #093909;
            margin-bottom: 30px;
            font-size: 1.5em;
            padding-right: 30px;
        }

        .name-inputs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }

        .name-inputs .input-group {
            margin-bottom: 10px;
        }

        .btn-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .save-btn, .cancel-btn {
            padding: 10px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .save-btn {
            background-color: #093909;
            color: #fff;
            border: 1px solid #093909;
        }

        .save-btn:hover {
            background-color: #fff;
            color: #093909;
        }

        .cancel-btn {
            background-color: #fff;
            color: #093909;
            border: 1px solid #093909;
        }

        .cancel-btn:hover {
            background-color: #f5f5f5;
        }

        .modal-body {
            max-height: calc(100vh - 200px);
            overflow-y: auto;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            padding: 10px 0 0 50px;
            font-size: 16px;
            font-weight: 600;
            color: #093909;
            margin-top: 120px;
            margin-bottom: 20px;
            margin-left: 60px;
        }

        .breadcrumb a {
            color: #093909;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 20px;
        }

        .breadcrumb i {
            font-size: 22px;
        }

        .breadcrumb span {
            margin-left: 8px;
            color: #666;
            font-weight: normal;
        }

        .account-section h2 {
            color: #093909;
            margin-bottom: 20px;
            font-size: 1.5em;
            font-weight: 600;
        }

        .form-select {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            background-color: #fff;
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: #093909;
        }

        .select-group {
            margin-bottom: 15px;
        }

        .select-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
        }

        .select-group select:focus {
            outline: none;
            border-color: #093909;
        }

        .select-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
            font-size: 14px;
        }
    </style>

<body>
    <?php 
       require_once '../student/includes/topnav.php';
       ?>

        <section class="settings">
            <div class="breadcrumb">
                <a href="setting.php"><i class="fas fa-arrow-left"></i> SETTINGS </a> <span>| Account</span>
            </div> <br>

            <div class="account-section">
                <h2>Account Information</h2>
                <div class="account-header">
                    <form action="#" class="account-form">
                        <div class="form-row">
                            <div class="input-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" placeholder="Enter Name" disabled>
                            </div>
                            <div class="input-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" placeholder="Enter Email" disabled>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group">
                                <label for="college">College:</label>
                                <input type="text" id="college" placeholder="Enter College" disabled>
                            </div>
                            <div class="input-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" placeholder="Enter Username" disabled>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="input-group">
                                <label for="course">Course:</label>
                                <input type="text" id="course" placeholder="Enter Course" disabled>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="edit-btn" onclick="openModal()">Edit</button>
                </div>
            </div>
        </section>

    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 class="modal-title">Edit Account Information</h2>
            <div class="modal-body">
                <form id="editForm">
                    <div class="input-group">
                        <label style="padding-bottom: 10px;">Name</label>
                        <div class="name-inputs">
                            <div class="input-group">
                                <label>First Name</label>
                                <input type="text" id="firstName" placeholder="First Name" required>
                            </div>
                            <div class="input-group">
                                <label>Middle Name</label>
                                <input type="text" id="middleName" placeholder="Middle Name (Optional)">
                            </div>
                            <div class="input-group">
                                <label>Last Name</label>
                                <input type="text" id="lastName" placeholder="Last Name" required>
                            </div>
                            <div class="input-group">
                                <label>Suffix</label>
                                <select id="suffix" class="form-select">
                                    <option value="">None</option>
                                    <option value="Jr.">Jr.</option>
                                    <option value="Sr.">Sr.</option>
                                    <option value="III">III</option>
                                    <option value="IV">IV</option>
                                    <option value="V">V</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="select-group">
                        <label for="editCollege">College:</label>
                        <select id="editCollege" name="editCollege" required>
                            <option value="">Select College</option>
                            <option value="CCS">College of Computing Studies</option>
                            <option value="CBA">College of Business Administration</option>
                            <option value="COE">College of Engineering</option>
                            <option value="CED">College of Education</option>
                            <option value="CLA">College of Liberal Arts</option>
                        </select>
                    </div>

                    <div class="select-group">
                        <label for="editCourse">Course:</label>
                        <select id="editCourse" name="editCourse" required>
                            <option value="">Select Course</option>
                            <option value="BSCS">Bachelor of Science in Computer Science</option>
                            <option value="BSIT">Bachelor of Science in Information Technology</option>
                            <option value="BSIS">Bachelor of Science in Information Systems</option>
                        </select>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="cancel-btn" onclick="closeModal()">Cancel</button>
                        <button type="submit" class="save-btn">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('editModal');

        function openModal() {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }

        // Handle form submission
        document.getElementById('editForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const firstName = document.getElementById('firstName').value;
            const middleName = document.getElementById('middleName').value;
            const lastName = document.getElementById('lastName').value;
            const suffix = document.getElementById('suffix').value;
            const college = document.getElementById('editCollege').value;
            const course = document.getElementById('editCourse').value;

            // Update main form
            const fullName = [firstName, middleName, lastName, suffix].filter(Boolean).join(' ');
            document.getElementById('name').value = fullName;
            document.getElementById('college').value = college;
            document.getElementById('course').value = course;

            // Close modal
            closeModal();
        });
    </script>
</body>
</html>
