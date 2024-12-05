<?php
?>

<style>
    .floating-btn {
      position: fixed;
     top: 88px;
      right: 28px;
      background-color: #004d00;
      color: white;
      border-radius: 50%;
      width: 54px;
      height: 54px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card-img {
      width: 50px;
      height: 50px;
      object-fit: cover;
    }
</style>


<div class="container my-4">
  <div class="modal-container"> </div>
    

       <div class="row justify-content-between">
           <div class="col-md-12">
              <div class="d-flex justify-content-between">
              <div class="d-flex align-items-center col-md-5 justify-content-between ">
                <i class="fas fa-arrow-left back-button"></i> 
                <img src="../../images/ccs_logo.png" alt="Logo" width="40" height="40" class="rounded-circle" >
                <div class="col-md-10 flex-column">
                  <h5>College of Computing Studies</h5>
                  <h6><span style="color: #004d00;">Organizations</span></h6>
                </div>
              </div>

              <div class="button">
               <button id="create-admin" class="btn bgreen"> Create College Admin</button>
            </div> 
              </div>
           </div>
                         
       </div>


    <!-- Card -->
  <div class="card shadow-sm mb-4 mt-4">
    <div class="card-body d-flex align-items-center">
      <img src="../images/gender_club.jpg" alt="Institution Logo" width="100" class="rounded-circle me-3">
      <div class="flex-grow-1">
        <h5 class="mb-1">Gender Club</h5>
        <p class="mb-1 text-muted">
          <i class="bi bi-people-fill me-1"></i>
          600,003
        </p>
        <small class="text-muted">Updated October 01, 2024</small>
      </div>
      <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown">
        <i class="bi bi-three-dots"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="#">Edit</a></li>
        <li><a class="dropdown-item" href="#">Delete</a></li>
        <li><a id="org-overview-link" class="dropdown-item" href="#">View</a></li>
      </ul>
    </div>
  </div>
</div>