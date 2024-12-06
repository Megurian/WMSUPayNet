<div class="container my-4">

    <h2 class="mb-4">Welcome, Admin! <span id="current-date"><?= date('Y-m-d') ?></span></h2>
    
    <!-- Stats Section -->
    <div class="row mb-4">
      <div class="col-md-4">
        <div class="card text-center shadow">
          <div class="card-body">
            <h5 class="card-title">Total Amount Collected</h5>
            <p class="display-5" id="total-amount-collected">0</p>
            <p>This week</p>
            <a href="#" class="btn btn-sm btn-outline-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center shadow">
          <div class="card-body">
            <h5 class="card-title">Total Registered Students</h5>
            <p class="display-5" id="total-registered-students">0</p>
            <p>This week</p>
            <a href="#" class="btn btn-sm btn-outline-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center shadow">
          <div class="card-body">
            <h5 class="card-title">Total Active Organizations</h5>
            <p class="display-5" id="total-active-organizations">0</p>
            <p>This week</p>
            <a href="#" class="btn btn-sm btn-outline-primary">View</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Graph and Recent Section -->
    <div class="row">
      <div class="col-lg-8 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="card-title">Total Collection Display per Organization:</h5>
            <div class="d-flex justify-content-end mb-3">
              <button class="btn btn-outline-secondary btn-sm">1D</button>
              <button class="btn btn-outline-secondary btn-sm mx-1">1M</button>
              <button class="btn btn-outline-secondary btn-sm">1Y</button>
              <button class="btn btn-outline-secondary btn-sm mx-1">Max</button>
            </div>
            <div id="chart-placeholder" style="height: 250px;">Chart placeholder</div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="card-title">Recent</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Reminder</span>
                <small class="text-muted">Date</small>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Alert</span>
                <small class="text-muted">Date</small>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span>Alert</span>
                <small class="text-muted">Date</small>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>