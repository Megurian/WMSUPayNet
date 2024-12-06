<?php
    require_once "../../tools/functions.php";
    require_once "../../database/autoload_classes.php";

    session_start();
    $organizationObj = new Organizations();
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

    .card:hover {
        border-color: #093909;
        cursor: pointer;
    }

</style>


<div class="container my-4">
<div class="modal-container"></div>
                <div class="d-flex align-items-center">
                <img src="../../images/ccs_logo.png" alt="Logo" width="40" height="40" class="rounded-circle m-2 ml-3" >
                <div class="d-flex flex-column" >
                    <h6><span style="color: #004d00;">College of Computing Studies</span></h6>
                    <h5 >Organizations</h5>
                </div>
                </div>
    
    <!-- Card -->
    <?php
        $organizations = $organizationObj->getAllOrganizationById($_SESSION['account']['college_id']);
        if (empty($organizations)): ?>
            <div style="text-align:center; margin-top:20px;">No Organizations</div>
        <?php else: ?>
            <?php foreach ($organizations as $organization): ?>
                <div class="card shadow-sm mb-4 mt-4">
                    <div class="card-body d-flex align-items-center">

                        <img src="<?= htmlspecialchars($organization['logo_directory']) ?>" alt="Organization Logo" width="100" class="rounded-circle me-3">

                        <div class="flex-grow-1 organization" data-organization-id="<?= htmlspecialchars($organization['id']) ?>">
                            <h5 class="mb-1"><?= htmlspecialchars($organization['name']) ?></h5>
                            <p class="mb-1 text-muted">
                                <i class="bi bi-people-fill me-1"></i>
                                600,003
                            </p>
                            <small class="text-muted">Updated <?= htmlspecialchars($organization['created_at']) ?></small>
                        </div>

                        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Edit</a></li>
                            <li><a class="dropdown-item" href="#">Delete</a></li>
                        </ul>
                    </div>
                </div>
        <?php endforeach; ?>
    <?php endif; ?>
    
    <!-- Floating Add Button -->
    <a id="add-organization" href="#" class="floating-btn">
      <i class="bi bi-plus"></i>
    </a>
  </div>