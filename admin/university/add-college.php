<?php
require_once '../../database/autoload_classes.php';

$collegeId = isset($_GET['college_id']) ? intval(clean_input($_GET['college_id'])) : 0;

$suffixesObj = new Suffixes();

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

<script>
    //Script to preview uploaded logo
    document.getElementById("logo-input").addEventListener("change", function(event) {
        const file = event.target.files[0]; // Get the selected file
        if (file) {
            const reader = new FileReader(); // Create a FileReader object
            reader.onload = function(e) {
                const preview = document.getElementById("logo-preview");
                preview.src = e.target.result; // Set the image source
                preview.style.display = "block"; // Show the image preview
                document.querySelector(".plus-icon").style.display = "none"; // Hide the plus icon
            };
            reader.readAsDataURL(file); // Read the file as a Data URL
        }
    });
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