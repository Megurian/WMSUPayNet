<div class="container-fluid">
    <h4>Dashboard</h4>
        <div class="row">
            <!-- Top Section -->
            <div class="cards col-12 d-flex justify-content-evenly align-items-center">
                    <div class="col-2 mb-3 ">
                        <div class="card bg-white-green py-2 ">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Total Transactions</h5>
                                <p class="card-text fs-4">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 mb-3">
                        <div class="card bg-white-green py-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Total Revenue  </h5>
                                <p class="card-text fs-4">0</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column col-3">
                        <div class="mb-3">
                            <div class="card-small p-2 bg-dark-green text-white">
                                <div class="d-flex justify-content-between card-body">
                                    <h5 class="card-title">Pending Transactions</h5>
                                    <p class="card-text px-2">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="card-small p-2 bg-dark-green text-white">
                                <div class="d-flex justify-content-between card-body">
                                    <h5 class="card-title">Failed Transactions</h5>
                                    <p class="card-text px-2">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="card bg-white-green text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title text-black">Recent</h5>
                                    <i class="bi bi-bell-fill fs-5 text-black"></i>
                                </div>
                                <ul class="list-group list-group-flush ">
                                    <li class="list-group-item border py-1 pb-0">
                                       <span class="badge bg-danger">!</span>
                                        <div class="d-flex justify-content-between px-0">
                                        <h6 class="green mt-1">Payment Due</h6>
                                         <p class="small text-muted">Just Now</p> 
                                         </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- Middle Section -->
            <div class="col-12">
                <div class="row">
                    <div class="col-5 mb-3">
                        <div class="card bg-white-green text-white">
                            <div class="card-body ">
                                <h5 class="card-title text-dark">Summary of Payments</h5>
                                <canvas id="paymentChart" style="height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 mb-3">
                        <div class="card bg-white-green text-white">
                            <div class="card-body">
                                <h5 class="card-title text-dark">Recent Payments</h5>
                                <table class="table table-striped table-white ">
                                   
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