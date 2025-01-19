<div class="container-fluid">
    <div class="row mt-4">
    <div class="col-md-4">
            <div class="card bg-secondary text-white border border-light ">
                <div class="card-body p-4">
                    <h5> Hello, Admin Name</h5>
                    <div class="col-md-6 mt-3">
                    <h6> school-year</h6>  <!-- Dropdown for school year -->
                        <select id="schoolYearSelect" class="form-select form-select-sm">
                            <option value="2023-2024">2023-2024</option>
                            <option value="2024-2025">2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                            <!-- Add more years as needed -->
                        </select>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div class="col-md-5">
            <div class="card bg-white-green text-white">
                <div class="card-body p-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title text-black">Recent</h5>
                        <i class="bi bi-bell-fill fs-5 text-black"></i>
                    </div>
                    <div class="col-md-14">
                    <ul class="list-group list-group-flush ">
                        <li class="list-group-item border py-1 pb-0">
                            <div class="d-flex justify-content-between align-items-center p-1">
                                <span class="badge bg-danger">!</span>
                                <h6 class="green mt-1">Payment Due</h6>
                                <small> Just Now</small>
                            </div>
                        </li>
                        <li class="list-group-item border py-1 pb-0 mt-1">
                            <div class="d-flex justify-content-between align-items-center p-1">
                                <span class="badge bg-danger">!</span>
                                <h6 class="green mt-1">Payment Due</h6>
                                <small> Just Now</small>
                            </div>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
    <div class="col-12">
                <div class="row justify-content-evenly">
                    <div class="col-md-4 mb-3">
                        <div class="card bg-white-green text-white">
                            <div class="card-body ">
                                <h5 class="card-title text-dark">Summary of Payments</h5>
                                <canvas id="paymentChart" style="height: 220px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 mb-3">
                        <div class="card bg-white-green text-white">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Recent Payments</h5>
                                <table class="table table-striped table-white pb-0 ">
                                   
                                    <tbody>
                                        <tr >
                                            <td>
                                                <small class=" text-muted">Sep. 10, 2024</small>
                                                <p class="small text-muted">10:40 AM</p>
                                             </td>
                                            <td>
                                                <small > Alfaith Mae Luzon</small>
                                                <p class="small text-muted">alfaiht@example.com</p>
                                            </td>
                                            <td>
                                                <small class="violet"> Membership Fee</small>
                                                <p class="small text-muted"> ₱50.00</p></td>
                                            </td>
                                        </tr>

                                        <tr >
                                            <td>
                                                <small class=" text-muted">Sep. 10, 2024</small>
                                                <p class="small text-muted">10:40 AM</p>
                                             </td>
                                            <td>
                                                <small > Alfaith Mae Luzon</small>
                                                <p class="small text-muted">alfaiht@example.com</p>
                                            </td>
                                            <td>
                                                <small class="violet"> Membership Fee</small>
                                                <p class="small text-muted"> ₱50.00</p></td>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td>
                                                <small class=" text-muted">Sep. 10, 2024</small>
                                                <p class="small text-muted">10:40 AM</p>
                                             </td>
                                            <td>
                                                <small > Alfaith Mae Luzon</small>
                                                <p class="small text-muted">alfaiht@example.com</p>
                                            </td>
                                            <td>
                                                <small class="violet"> Membership Fee</small>
                                                <p class="small text-muted"> ₱50.00</p></td>
                                            </td>
                                        </tr>
                                        <tr >
                                            <td>
                                                <small class=" text-muted">Sep. 10, 2024</small>
                                                <p class="small text-muted">10:40 AM</p>
                                             </td>
                                            <td>
                                                <small > Alfaith Mae Luzon</small>
                                                <p class="small text-muted">alfaiht@example.com</p>
                                            </td>
                                            <td>
                                                <small class="violet"> Membership Fee</small>
                                                <p class="small text-muted"> ₱50.00</p></td>
                                            </td>
                                        </tr>
                                       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
