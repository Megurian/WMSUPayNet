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
                            <th >Course</span></th>
                            <th class="sort-column" data-sort-by="name">Year<span class="sort-icon"></th>
                            <th >Email</th>
                            <th >Phone Number</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>eh12345</td>
                            <td> Luzon, Alfaith Mae </td>
                            <td>Computer Science</td>
                            <td>3rd Year</td>
                            <td>Alfaith@example.com</td>
                            <td>093-4556-7890</td>
                            <td>
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
                    </tbody>
                </table>

            </div>

        </div>
        
</div>