<div class="container-fluid">
<h5 class="mt-3">Course</h5>
            <div class="row m-3">
            <div class=" border rounded p-2 col-md-3 mx-3">
                    <h6 class=" border-bottom p-2"> New Course</h6>
                    <form class=" p-2" action="">
                        <label class="mb-2" for=""> Course ID</label>
                        <input type="text" class="form-control" placeholder="Program ID">
                        <div class="mb-2"></div>
                        <label class="mb-2" for=""> Name</label>
                        <input type="text" class="form-control" placeholder="Program Name">
                    </form>
                    
                    <div class="p-2">
                        
                      <button type="submit" class="btn btn bgreen btn-sm">Save </button>
                    </div>
                </div>
                <div class=" col-md-8 border p-2">
                    <h6> Course</h6>
                      <table class="table">
                        <thead class="nohead">
                            <th>Course ID</th>
                            <th> Course Name</th>
                            <th> Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-secondary">cs232</td>
                                <td> Computer Science</td>
                                <td>
                                <div class="dropdown text-end border-0 bgreen">
                                   <a href="#" class="box " data-bs-toggle="dropdown" aria-expanded="false">
                                      <div class="text-black" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                      </div>
                                   </a>
                                    <ul class="dropdown-menu text-small">
                                       <a id="" class="dropdown-item" href="#">Edit</a> 
                                       <a id="" class="dropdown-item" href="#">Delete</a> 
                                    </ul>
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-secondary">IT344</td>
                                <td>Information Technology</td>
                                <td>
                                <div class="dropdown text-end border-0 bgreen">
                                   <a href="#" class="box " data-bs-toggle="dropdown" aria-expanded="false">
                                      <div class="text-black" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                           <i class="fas fa-ellipsis-v"></i>
                                      </div>
                                   </a>
                                    <ul class="dropdown-menu text-small">
                                       <a id="" class="dropdown-item" href="#">Edit</a> 
                                       <a id="" class="dropdown-item" href="#">Delete</a> 
                                    </ul>
                                </div>
                                </td>
                            </tr>
                        </tbody>
                      </table>
                </div>
            </div>
</div>