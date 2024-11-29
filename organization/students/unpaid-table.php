<div class="container-fluid">
    <div class="modal-container"></div>
            <div class="table-container">
            <div class="d-flex mt-1">
                <div class="d-flex align-items-center m-1">
                    <select id="category-filter" class="form-select">
                        <option value="choose">Course</option>
                        <option value="">All</option>
                        <option value="">Computer Science</option>
                        <option value="">Information Tech</option>
                        <option value="">Computer Techn</option>
                    </select>
                </div>
                <div class="d-flex align-items-center m-1">
                    <select id="category-filter" class="form-select">
                        <option value="choose">Payment Method</option>
                        <option value="">All</option>
                        <option value="">Gash</option>
                        <option value="">Paymaya</option>
                    </select>
                </div>
            </div>

               
                <table id="table-all" class="table table-striped mt-5">
                    <thead>
                        <tr>
                            <th class="sort-column" data-sort-by="name">Name <span class="sort-icon"></span></th>
                            <th >Course</span></th>
                            <th class="sort-column" data-sort-by="name">Year<span class="sort-icon"></th>
                            <th >Status</th>
                            <th >Attachments</th>
                            <th class="sort-column" data-sort-by="name">Date<span class="sort-icon"></th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>Computer Science</td>
                            <td>3rd Year</td>
                            <td class="status-unpaid">Unpaid</td>
                            <td class="status-unpaid">Promissory Note</td>
                            <td>2023-12-15</td>
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
                        <tr>
                            <td>Jane Smith</td>
                            <td>Business Administration</td>
                            <td>2nd Year</td>
                            <td class="status-unpaid">Unpaid</td>
                            <td class="status-unpaid">Promissoy Note</td>
                            <td>-</td>
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
                        <tr>
                            <td>Peter Jones</td>
                            <td>Engineering</td>
                            <td>1st Year</td>
                            <td class="status-unpaid">Unpaid</td>
                            <td class="status-unpaid">Promissory Note</td>
                            <td>2023-12-01</td>
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