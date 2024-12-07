<?php
    require_once '../../database/autoload_classes.php';

    session_start();

    $coursesObj = new Courses();
    $collegesObj = new Colleges();
    $religionsObj = new Religions();
    $suffixesObj = new Suffixes();
?>

<!-- Modal -->
<div class="modal fade" id="modal-add-student" tabindex="-1" aria-labelledby="modal-add-studentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modal-add-studentLabel">Student Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> 

            <form id="form-add-student" enctype="multipart/form-data">

                <input type="hidden" name="college" value="<?= htmlspecialchars($_SESSION['account']['college_id']) ?>">

                <div class="modal-body">
                    <!-- Student Information -->
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-2">
                                <label for="middle_name" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
                                <div class="invalid-feedback"></div>
                                <div class="d-flex align-items-center mt-2">
                                    <label class="form-check-label me-2" for="no-middle-name">No Middle Name</label>
                                    <input type="checkbox" id="no-middle-name" name="no-middle-name">
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-2">
                                <label for="suffix" class="form-label">Suffix</label>
                                <select id="suffix" name="suffix" class="form-select">
                                    <option value="">N/A</option>
                                    <?php foreach ($suffixesObj->getAllSuffix() as $suffix): ?>
                                        <option value="<?= $suffix['id'] ?>">
                                            <?= htmlspecialchars($suffix['extension']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-6">
                            <div class="mb-2">
                                <label for="studentId" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="studentId" name="studentId" placeholder="Student ID">
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-2">
                                <label for="course" class="form-label">Course</label>
                                <select class="form-select" id="course" name="course">
                                    <?php foreach ($coursesObj->getCoursesByCollege($_SESSION['account']['college_id']) as $course): ?>
                                <option value="<?= $course['id'] ?>" >
                                            <?= htmlspecialchars($course['course']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-2">
                                <label for="year_level" class="form-label">Year Level</label>
                                <select class="form-select" id="year_level" name="year_level">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5+</option>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>

                            <div class="mb-2">
                                <label for="religion" class="form-label">Religion</label>
                                <select class="form-select" id="religion" name="religion">
                                    <?php foreach ($religionsObj->getAllReligions() as $religion): ?>
                                        <option value="<?= $religion['id'] ?>" >
                                            <?= htmlspecialchars($religion['religion']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn bgreen">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>