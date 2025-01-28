<div class="container-fluid">
<div class="modal-container"></div>
            <div class="table-container">
            <div class="d-flex mt-1">
                
                <div class="d-flex align-items-center m-1">
                    <select id="category-filter" class="form-select">
                        <option value="choose">Status</option>
                        <option value="">All</option>
                        <option value="">Paid</option>
                        <option value="">Unpaid</option>
                    </select>
                </div>
                <div class="d-flex align-items-center m-1">
                    <select id="category-filter" class="form-select">
                        <option value="choose">Course</option>
                        <option value="">All</option>
                        <option value="">Computer Science</option>
                        <option value="">Information Tech</option>
                        <option value="">Computer Techn</option>
                    </select>
                </div>
                <!-- <div class="d-flex align-items-center m-1">
                    <select id="category-filter" class="form-select">
                        <option value="choose">Payment Method</option>
                        <option value="">All</option>
                        <option value="">Gash</option>
                        <option value="">Paymaya</option>
                    </select>
                </div> -->
            </div>

            
                <div class="d-flex justify-content-end">
                <div class="buttons mb-3 ">
                    <a id="add-payment" href="#" class="btn btn bgreen btn-sm"> Manual Pay</a> 
                    <a id="add-student" href="#" class="btn btn bgreen btn-sm"> Add Student</a>
                </div>
                </div>
                <table id="table-all" class="table table-striped">
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
                            <td>Alfaith Mae M. Luzon</td>
                            <td>Computer Science</td>
                            <td>3rd Year</td>
                            <td class="status-paid">Fully Paid</td>
                            <td>Receipt</td>
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
                            <td>Clark Falcatan</td>
                            <td>Computer Science</td>
                            <td>2nd Year</td>
                            <td class="status-unpaid">Unpaid</td>
                            <td>Promissory Note </td>
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
                            <td>Ayana Jade</td>
                            <td>Information Technology
                            </td>
                            <td>1st Year</td>
                            <td class="status-paid"> Fully Paid</td>
                            <td>Receipt</td>
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