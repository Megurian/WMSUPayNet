<div class="container mt-3">
<div class="modal-container"></div>
        <div class="d-flex align-items-center justify-content-between mb-4">
           <div class="d-flex">
            <div class="d-flex align-items-center m-1 ">
                    <select id="" class="form-select">
                        <option value="choose">Semester</option>
                        <option value="">All</option>
                        <option value="">1</option>
                        <option value="">2</option>
                    </select>
            </div>

                <div class="date m-1">
                    <input type="date" class="form-control">
                </div>
           </div>
            <div class="col-md-2">
                <button id="report-form" class="btn bgreen btn-block">Generate Report <span class="ml-2"><i class="fa fa-download"></i></span></button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card br-green">
                    <div class="card-header bg-green text-white">
                        <i class="fa fa-chart-bar mr-2"></i> Weekly Payment Summary
                        <span class="badge badge-warning badge-pill float-right">Pending</span>
                    </div>
                    <div class="card-body">
                        <div class="mb-2">
                            <i class="fa fa-calendar mr-2"></i> May 8, 2024 - May 14, 2024
                        </div>
                        <div class="mb-3">
                            <i class="fa fa-university mr-2"></i> 1st Semester
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-dark mx-2">View Report</button>
                            <button class="btn bgreen" disabled>Download Report</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card br-green">
                    <div class="card-header bg-green text-white">
                        <i class="fa fa-chart-bar mr-2"></i> Weekly Payment Summary
                        <span class="badge badge-success badge-pill float-right">Generated</span>
                    </div>
                    <div class="card-body ">
                        <div class="mb-2">
                            <i class="fa fa-calendar mr-2"></i> May 1, 2024 - May 7, 2024
                        </div>
                        <div class="mb-3">
                            <i class="fa fa-university mr-2"></i> 1st Semester
                        </div>
                        <div class="d-flex justify-content-center">
                            <button id="view-report" class="btn btn-dark mx-2">View Report</button>
                            <button id="download-report"  class="btn bgreen">Download Report</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>