<?php
require_once 'database/autoload_classes.php';
require_once 'tools/functions.php';

session_start();

$Errors = $_SESSION['Errors'] ?? [];
$StudentInfo = $_SESSION['StudentInfo'] ?? [];

unset($_SESSION['Errors']);
unset($_SESSION['StudentInfo']);

$coursesObj = new Courses();
$collegesObj = new Colleges();
$religionsObj = new Religions();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <title>WMSU PayNet Registration</title>
    <link rel="stylesheet" href="vendor/bootstrap-5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor//bootstrap-icons-1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="vendor/datatable-2.1.8/datatables.min.css" >
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
   <div class="background">
   <div class="form-container ">
        <img src="images/wmsu_logo.png" alt="Logo" width="60" height="60" class="img-fluid logo mb-3">
        <form action="account/signup.logic.php" method="post">

            <div class="form-group">
                <label for="school-id">School ID:</label>
                <input type="number" id="school-id" name="school-id" value="<?php echo htmlspecialchars($StudentInfo['school_id'] ?? ''); ?>" required>
                <?php if(!empty($Errors['school_id'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['school_id']) ?></span><br>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" value="<?php echo htmlspecialchars($StudentInfo['first_name'] ?? ''); ?>" required>
                <?php if (!empty($Errors['first_name'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['first_name']) ?></span><br>
                <?php endif; ?>
            </div>

            <div class="form-group"> 
                <label for="middle-name">Middle Name:</label> 
                <input type="text" id="middle-name" name="middle-name" value="<?php echo htmlspecialchars($StudentInfo['middle_name'] ?? ''); ?>"> 
                <div class="col-md-4 align-items-center d-flex mt-2">
                <label class="col-md-10"> No Middle Name</label> 
                <input type="checkbox" id="no-middle-name" name="no-middle-name" <?php echo !empty($StudentInfo['no_middle_name']) ? 'checked' : ''; ?>> 
                </div>
                <?php if (!empty($Errors['middle_name'])): ?> 
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['middle_name']) ?></span><br> 
                <?php endif; ?> 
            </div>

            <div class="form-group">
                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" value="<?php echo htmlspecialchars($StudentInfo['last_name'] ?? ''); ?>" required>
                <?php if (!empty($Errors['last_name'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['last_name']) ?></span><br>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="suffix">Suffix:</label>
                <select id="suffix" name="suffix">
                    <option value="">N/A</option>
                    <option value="Jr." <?php echo ($StudentInfo['suffix'] ?? '') === 'Jr.' ? 'selected' : ''; ?>>Jr.</option>
                    <option value="Sr." <?php echo ($StudentInfo['suffix'] ?? '') === 'Sr.' ? 'selected' : ''; ?>>Sr.</option>
                    <option value="III" <?php echo ($StudentInfo['suffix'] ?? '') === 'III' ? 'selected' : ''; ?>>III</option>
                </select>
            </div>

            <div class="form-group">
                <label for="college">College:</label>
                <select id="college" name="college">
                    <option value="">Select a College</option>
                    <?php foreach ($collegesObj->getAllColleges() as $college): ?>
                        <option value="<?= $college['id'] ?>" <?php echo ($StudentInfo['college'] ?? '') == $college['id'] ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($college['college']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (!empty($Errors['college'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['college']) ?></span><br>
                <?php endif; ?>
            </div>
            
            <div class="form-group">
                <label for="course">Course:</label>
                <select id="course" name="course">
                    <option value="">Select a Course</option>
                    <!-- Dynamic loading of courses -->
                </select>
                <?php if (!empty($Errors['course'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['course']) ?></span><br>
                <?php endif; ?>
            </div>
                    
            <div class="form-group">
                <label for="religion">Religion:</label>
                <select id="religion" name="religion">
                    <option value="">Select a Religion</option>
                    <?php foreach ($religionsObj->getAllReligions() as $religion): ?>
                        <option value="<?= $religion['id'] ?>" <?php echo ($StudentInfo['religion'] ?? '') == $religion['id'] ? 'selected' : ''; ?>>
                            <?= htmlspecialchars($religion['religion']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (!empty($Errors['religion'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['religion']) ?></span><br>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($StudentInfo['email'] ?? ''); ?>" required>
                <?php if (!empty($Errors['email'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['email']) ?></span><br>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">Create Password:</label>
                <input type="password" id="password" name="password" required>
                <?php if (!empty($Errors['password'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['password']) ?></span><br>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <?php if (!empty($Errors['confirm_password'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['confirm_password']) ?></span><br>
                <?php endif; ?>
            </div>

            <button class="register-btn" type="submit">Register</button>
        </form>
    </div>
   </div>
    <script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
    <script>
    $(document).ready(function () {
        // Function to fetch courses based on selected college
        function fetchCourses(collegeId, selectedCourseId) {
            // Clear existing courses
            $('#course').html('<option value="">Select a Course</option>');

            if (collegeId) {
                $.ajax({
                    url: 'courses/get_courses.php', // PHP script to fetch courses
                    type: 'POST',
                    data: { 
                        college_id: collegeId,
                        selected_course_id: selectedCourseId // Pass the selected course ID
                    },
                    success: function (data) {
                        // Populate the course dropdown
                        $('#course').html(data);
                    },
                    error: function () {
                        alert('An error occurred while fetching courses.');
                    }
                });
            }
        }
        
        //Error display when not failed signup
        var not_enrolled = '<?php echo htmlspecialchars($Errors['not_enrolled'] ?? '', ENT_QUOTES, 'UTF-8'); ?>'; 
        if (not_enrolled){ 
            alert(not_enrolled);
        }

        // Event listener for college dropdown change
        $('#college').change(function () {
            var collegeId = $(this).val(); // Get selected college ID
            var selectedCourseId = $('#course').val(); // Get currently selected course ID
            fetchCourses(collegeId, selectedCourseId); // Fetch courses for the selected college
        });

        // Check if a college is already selected on page load
        var selectedCollegeId = $('#college').val(); // Get the currently selected college ID
        var selectedCourseId = '<?php echo htmlspecialchars($StudentInfo['course'] ?? ''); ?>'; // Get the selected course from PHP
        if (selectedCollegeId) {
            fetchCourses(selectedCollegeId, selectedCourseId); // Fetch courses for the selected college
        }
    });
</script>
</body>
</html>
