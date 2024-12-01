<?php
?>

<style>
    .floating-btn {
      position: fixed;
     top: 82px;
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

    .card:hover {
        border-color: #093909;
        cursor: pointer;
    }

</style>


<div class="container my-4">
<div class="modal-container"></div>
    <h3 class="mb-4">Colleges</h3>
    
    <!-- Card -->
    <div class="card shadow-sm mb-4" id="1">
        <div class="card-body d-flex align-items-center">
            <img src="../images/ccs_logo.png" alt="Institution Logo" width="100" class="rounded-circle me-3">
            <div class="flex-grow-1">
                <h5 class="mb-1">College of Computing Studies</h5>
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
                <li><a id="organization-link" class="dropdown-item" href="#">View</a></li>
            </ul>
        </div>
    </div>
    
    <!-- Floating Add Button -->
    <a id="add-college" href="#" class="floating-btn">
      <i class="bi bi-plus"></i>
    </a>
  </div>