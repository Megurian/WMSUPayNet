
    <div class="container mt-5">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex ">
                    <i class="fa fa-check-circle fa-2x mx-1"></i>
                    <div>
                            <h5 class="mb-0">You're up to date</h5>
                            <p class="mb-0">Last checked: <span class="font-weight-bold">mm/dd/yyyy</span></p>
                    </div>
                </div>
                    <div class="row mb-3">
                        <div class="col-md-12 text-right">
                            <button class="btn btn-primary">Check for updates</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0">Get the latest update as soon as possible</p>
                    <input type="checkbox" data-toggle="toggle" data-on="On" data-off="Off" data-onstyle="success" data-offstyle="danger" checked>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-0">Pause updates</p>
                    <select class="form-control">
                        <option value="Pause for 1 Week">Pause for 1 Week</option>
                        <option value="Pause for 1 Month">Pause for 1 Month</option>
                        <option value="Pause for 3 Months">Pause for 3 Months</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-12">
                <p class="mb-0">Update history</p>
            </div>
        </div>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').bootstrapSwitch();
        });
    </script>
