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
                        <option value="choose">User Type</option>
                        <option value="">All</option>
                        <option value="">Student</option>
                        <option value="">Organization</option>
                    </select>
                </div>
               
            </div>

            <div class="table border p-3 rounded mt-3">
            <table id="table-all" class="table  table-striped mb-0">
                    <thead>
                    <tr>
                            <th >ID</th>
                            <th >User Type</th>
                            <th >Issue Type</th>
                            <th >Attachment</th>
                            <th >Status</th>
                            <th>Date Submitted</th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>eh62535</td>
                            <td>Student</td>
                            <td>Payment</td>
                            <td id="attachment-link">Attachment</td>
                            <td>Pending</td>
                            <td>10/12/2024</td>
                            <td>
                                <div class="dropdown text-end border-0 bgreen">
                                   <a href="#" class="box " data-bs-toggle="dropdown" aria-expanded="false">
                                      <button class="btn bgreen dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                      </button>
                                   </a>
                                    <ul class="dropdown-menu text-small">
                                       <a id="" class="dropdown-item" href="#">Delete</a> 
                                       <a id="transaction" class="dropdown-item" href="#">View Details</a> 
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>org123e</td>
                            <td>Admin</td>
                            <td>Access control</td>
                            <td id="attachment-link">Attachment</td>
                            <td>Pending</td>
                            <td>13/12/2024</td>
                            <td>
                                <div class="dropdown text-end border-0 bgreen">
                                   <a href="#" class="box " data-bs-toggle="dropdown" aria-expanded="false">
                                      <button class="btn bgreen dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                      </button>
                                   </a>
                                    <ul class="dropdown-menu text-small">
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