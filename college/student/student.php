<?php
    require_once '../../database/autoload_classes.php';

    session_start();

    $studentObj = new Students();
    $suffixObj = new Suffixes();
    $courseObj = new Courses();
?>

<div class="container-fluid mt-3">
<div class="modal-container"></div>
        <div class="table-container">
            <h5> Student List </h5>
            <div class="d-flex mt-1 justify-content-between align-items-center ">
                
                <div class="d-flex align-items-center m-1">
                    <select id="category-filter" class="form-select">
                        <option value="choose">Course</option>
                        <option value="">All</option>
                        <option value="">Computer Science</option>
                        <option value="">Information Tech</option>
                        <option value="">Computer Techn</option>
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <div class="buttons mb-3 ">
                        <input type="file" class="btn btn bgreen btn-sm" id="upload-button">
                    <button>Upload</button>
                        <a id="add-student" href="#" class="btn btn bgreen btn-sm"> Add Student</a>
                    </div>
                </div>

            </div>
        
            <div class="table-responsive border-bottom mt-3 mb-1">

                <table id="table-all" class="table table-striped table-nowrap table-bordered mb-4">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th class="sort-column" data-sort-by="name">Name <span class="sort-icon"></span></th>
                            <th>Course</span></th>
                            <th class="sort-column" data-sort-by="name">Year Level<span class="sort-icon"></th>
                            <th style="display: flex; justify-content: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($studentObj->getStudentsbyCollegeId($_SESSION['account']['college_id']) as $student): ?>
                            <tr>
                                <td><?= htmlspecialchars($student['school_id']) ?></td>
                                <td><?= htmlspecialchars($student['first_name'] . " " . $student['middle_name'] . " " . $student['last_name'] . " " . htmlspecialchars($suffixObj->getSuffixName($student['suffix_id']))) ?></td>
                                <td><?= htmlspecialchars($courseObj->getCourseById($student['course_id'])) ?></td>
                                <td><?= htmlspecialchars($student['year_level']) ?></td>
                                <td style="display: flex; justify-content: center;">
                                    <div class="dropdown text-end border-0 bgreen">
                                        <a href="#" class="box " data-bs-toggle="dropdown" aria-expanded="false">
                                            <button class="btn bgreen dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </a>
                                        <ul class="dropdown-menu text-small">
                                            <a id="" class="dropdown-item" href="#">Edit</a> 
                                            <a id="" class="dropdown-item" href="#">Delete</a> 
                                            <a id="transaction" class="dropdown-item" href="#">View Details</a> 
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>

        </div>

</div>