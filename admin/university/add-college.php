<?php
require_once '../../database/autoload_classes.php';
require_once '../../tools/functions.php';

$suffixesObj = new Suffixes();

$collegeId = isset($_GET['college_id']) ? intval(clean_input($_GET['college_id'])) : 0;

?>

<!-- Modal -->
<div class="modal fade" id="addCollegeModal" tabindex="-1" aria-labelledby="addCollegeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCollegeModalLabel"> College Details </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> 
            <form id="form-add-college" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row mb-3">

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="logo">Upload Logo</label>
                                    <div class="logo-container mt-2" id="upload">
                                        <input type="file" name="logo" id="logo-input" accept="image/*">
                                        <img id="logo-preview" src="#" alt="Logo Preview" style="display: none;" >
                                        <i class="fas fa-plus plus-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 mt-4">
                                <div class="col-md-9 mb-3">
                                    <div class="form-group">
                                        <label for="collegeName">College Name:</label>
                                        <input type="text" class="form-control" id="collegeName" name="collegeName" placeholder="Enter College Name">
                                    </div>
                                </div>

                                <div class="col-md-9 mb-3">
                                    <div class="form-group">
                                        <label for="collegeCode">College Code:</label>
                                        <input type="text" class="form-control" id="collegeCode" name="collegeCode" placeholder="College Code" readonly>
                                        <small class="text-muted">College code is permanent and cannot be modified.</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2 mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="contactNo">Description</label>
                                        <textarea type="text " rows="4" maxlength="255" class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="buttons">
                        <button  type="submit" class="btn bgreen" data-bs-dismiss="modal" data-bs-toggle="modal"> Save </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../js/UX.js"></script>
<script>
    var ignoreWords = ["of", "and", "the", "at", "in", "on", "to", "a", "an", "for", "by", "with", "from"];

    //Real=time validation college name format and generate college code
    document.getElementById("collegeName").addEventListener("input", function(event) {
        var collegeName = document.getElementById("collegeName");

        // split the college name into words
        var words = collegeName.value.split(' ');

        // Format each word
        var formattedWords = words.map(word => {
            word = word.trim(); // Remove any extra spaces
            if (word && !ignoreWords.includes(word.toLowerCase())) { // Ignore "of", "and", and "the"
                return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase(); // Capitalize the first letter and lowercase the rest
            } else {
                return word.toLowerCase(); // Keep the word as is
            }
        });
        collegeName.value = formattedWords.join(' ');

        var collegeCode = document.getElementById("collegeCode");

        var significantWords = words.filter(word => 
            !ignoreWords.includes(word.toLowerCase().trim())
        );

        // If exactly two significant words
        if (significantWords.length >= 3) {
            var collegeCodeValue = '';
            significantWords.forEach(word => {
                word = word.trim();
                if (word) {
                    collegeCodeValue += word.charAt(0).toUpperCase();
                }
            });
        } else {
            var firstWord = significantWords[0];
            var secondWord = significantWords[1];
            collegeCodeValue = firstWord.charAt(0) + secondWord.substring(0, 4);
        }

        //Return the College Code Value
        collegeCode.value = collegeCodeValue;
    });

    //Remove extra spaces in college name and generate college code again
    document.getElementById("collegeName").addEventListener("blur", function(event) {
        var collegeName = document.getElementById("collegeName");

        collegeName.value = removeExtraSpaces(collegeName.value);
        var words = collegeName.value.split(' ');

        var collegeCode = document.getElementById("collegeCode");

        var significantWords = words.filter(word => 
            !ignoreWords.includes(word.toLowerCase().trim())
        );

        // If exactly two significant words
        if (significantWords.length >= 3) {
            var collegeCodeValue = '';
            significantWords.forEach(word => {
                word = word.trim();
                if (word) {
                    collegeCodeValue += word.charAt(0).toUpperCase();
                }
            });
        } else {
            var firstWord = significantWords[0];
            var secondWord = significantWords[1];
            collegeCodeValue = firstWord.charAt(0) + secondWord.substring(0, 4);
        }

        //Return the College Code Value
        collegeCode.value = collegeCodeValue;
    });

    function removeExtraSpaces(string) {
        return string.trim().replace(/\s+/g, ' ');
    }
</script>

<!-- Modal -->
<div class="modal fade" id="modal-create-admin" tabindex="-1" aria-labelledby="modal-create-adminLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-create-adminLabel"> Admin Information </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> 
            <form id="form-create-admin" enctype="multipart/form-data">
                <div class="modal-body">
                    
                    <input type="hidden" name="college" value="<?= $collegeId ?>">

                    <!-- Admin Information -->
                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
                        <div class="invalid-feedback"></div>
                        <div class="col-md-4 align-items-center d-flex mt-2">
                            <label class="col-md-10"> No Middle Name</label> 
                            <input type="checkbox" id="no-middle-name" name="no-middle-name"> 
                        </div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="suffix">Suffix:</label>
                        <select id="suffix" name="suffix" class="form-select">
                            <option value="">N/A</option>
                            <?php foreach ($suffixesObj->getAllSuffix() as $suffix): ?>
                                <option value="<?= $suffix['id'] ?>" <?php echo ($StudentInfo['suffix'] ?? '') == $suffix['id'] ? 'selected' : ''; ?>>
                                    <?= htmlspecialchars($suffix['extension']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback"></div>
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="confirm-password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" required>
                        <div class="invalid-feedback"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <div class="buttons">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bgreen" > Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("password").addEventListener("input", function(event) {
        const password = document.getElementById("password");
        const errors = validatePassword({ password: password.value });

        if (errors.length > 0) {
            password.classList.add("is-invalid");
            password.nextElementSibling.innerHTML = errors[0];
        } else {
            password.classList.remove("is-invalid");
            password.classList.add("is-valid");
            password.nextElementSibling.innerHTML = "";
        }
    });

    document.getElementById("confirm-password").addEventListener("input", function(event) {
        const password = document.getElementById("password");
        const confirm_password = document.getElementById("confirm-password");
        const errors = confirmPassword({ password: password.value, confirm_password: confirm_password.value });

        if (errors.length > 0) {
            confirm_password.classList.add("is-invalid");
            confirm_password.nextElementSibling.innerHTML = errors[0];
        } else {
            confirm_password.classList.remove("is-invalid");
            confirm_password.classList.add("is-valid");
            confirm_password.nextElementSibling.innerHTML = "";
        }
    });

    function validatePassword(data) {
        let errors = [];
        
        // Check if password is empty
        if (!data.password) {
            errors.push('Password is required to add admin');
        }
        // Check password length
        else if (data.password.length < 8) {
            errors.push('Enter atleast 8 characters password');
        }
        // Check password complexity using regex
        else if (
            !/[0-9]/.test(data.password) ||
            !/[A-Z]/.test(data.password) ||
            !/[a-z]/.test(data.password) ||
            !/[^a-zA-Z0-9]/.test(data.password)
        ) {
            errors.push('Password must contain at least 1 number, 1 uppercase, 1 lowercase, 1 special');
        }
        // Check if password contains personal information
        else if (
            data.password.includes(data.first_name) ||
            data.password.includes(data.last_name) ||
            data.password.includes(data.email)
        ) {
            errors.push('Weak password, please try a different password.');
        }

        return errors;
    }

    function confirmPassword(data) {
        let errors = [];
         
        if (!data.confirm_password) {
            errors.push('Please confirm your password.');
        }
        // Check if passwords match
        else if (data.confirm_password !== data.password) {
            errors.push('Password does not match!');
        }

        return errors;
    }
</script>