<?php
  require_once "../../tools/functions.php";
  require_once "../../database/autoload_classes.php";

  $organizationObj = new Organizations();
  $adminObj = new Admins();
  $collegeObj = new Colleges();
  $suffixObj = new Suffixes();

  $collegeId = isset($_GET['college_id']) ? intval($_GET['college_id']) : 0;
  $college = $collegeObj->getCollegeById($collegeId);
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

    .saturate-low {
    filter: saturate(0.01); /* 50% saturation */
}
</style>


<div class="container my-4">
    <div class="modal-container"></div>

        <div class="row justify-content-between border-bottom">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center col-md-5 justify-content-between">
                        <i class="fas fa-arrow-left back-button"></i>
                        <img src="../../images/ccs_logo.png" alt="Logo" width="40" height="40" class="rounded-circle">
                        <div class="col-md-10 d-flex flex-column">
                          <h5><?= htmlspecialchars($college['college']) ?></h5>
                          <h6><span style="color: #004d00;">Organizations</span></h6>
                        </div>
                    </div>
                    <div class="button">
                        <button id="create-admin" class="btn bgreen">Create College Admin</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-evenly align-items-center pt-2">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h6> Total of Enrolled Students</h6>
                        <h4> 0 </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h6> Total of Active Organizations</h6>
                        <h4> 0 </h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h6> Total Collection of CSC</h6>
                        <h4> 0 </h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- College's Admin Table -->
        <div class="table-container">
            <div class="table-responsive">
                <table id="table-all" class="table table-striped table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Admin Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php foreach ($adminObj->getAllCollegeAdminById($collegeId) as $admin): ?>
                            <?php $email = $adminObj->fetchAdminEmail($admin['account_id']); ?>
                                <tr>
                                    <td><?= htmlspecialchars($admin['first_name']) . " " . htmlspecialchars($admin['middle_name']) . " " . htmlspecialchars($admin['last_name']) . " " . htmlspecialchars($suffixObj->getSuffixName($admin['suffix_id'])) ?></td>
                                    <td><?= htmlspecialchars($email['email'])?></td>
                                    <td>All</td>
                                </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Card -->
        <?php
            $organizations = $organizationObj->getAllOrganizationById($collegeId);
            if (empty($organizations)): ?>
                <div style="text-align:center; margin-top:20px;">No Organizations</div>
            <?php else: ?>
                <!-- Display Primary Organization First -->
                <?php foreach ($organizations as $organization): ?>
                    <?php if (htmlspecialchars($organization['isPrimary']) == 1): ?>
                        <div class="card shadow-sm mb-4 mt-4">
                            <div class="card-body d-flex align-items-center">
                            <img src="<?= htmlspecialchars($organization['logo_directory']) ?>" alt="Organization Logo" width="100" 
                                    <?php if (htmlspecialchars($organization['isActive']) != 1): ?>
                                        class="rounded-circle me-3 saturate-low">
                                    <?php else: ?>
                                        class="rounded-circle me-3">
                                    <?php endif; ?>
                                <div class="flex-grow-1 organization" data-organization-id="<?= htmlspecialchars($organization['id']) ?>">
                                    <h5 class="mb-1"><?= htmlspecialchars($organization['name']) ?> 
                                        <span class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis rounded-pill" style="font-size: 0.50em;">Primary</span>
                                        <?php if (htmlspecialchars($organization['isActive']) != 1): ?>
                                            <span class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill" style="font-size: 0.50em;">Deactivated</span>
                                        <?php endif; ?>
                                    </h5>
                                    <p class="mb-1 text-muted">
                                        <i class="bi bi-people-fill me-1"></i>
                                        600,003
                                    </p>
                                    <small class="text-muted">Updated October 01, 2024</small>
                                </div>
                                <!-- Dropdown button and menu -->
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end" 
                                    data-college-id="<?= htmlspecialchars($collegeId) ?>" 
                                    data-organization-id="<?= htmlspecialchars($organization['id']) ?>"
                                    data-organization-name="<?= htmlspecialchars($organization['name']) ?>"
                                >
                                    <li><a class="dropdown-item setPrimary" href="#">Set as Primary Organization</a></li>
                                    <!-- Dynamic Activate & Deactivate  Dropdown-->
                                    <li><a class="dropdown-item 
                                        <?php if (htmlspecialchars($organization['isActive']) != 1): ?>
                                            activate" href="#">Activate</a></li>
                                        <?php else: ?>
                                            deactivate" href="#">Deactivate</a></li>
                                        <?php endif; ?>
                                </ul> 
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>

                <!-- Then Display Non-Primary Organizations -->
                <?php foreach ($organizations as $organization): ?>
                    <?php if (htmlspecialchars($organization['isPrimary']) != 1): ?>
                        <div class="card shadow-sm mb-4 mt-4">
                            <div class="card-body d-flex align-items-center">
                                <img src="<?= htmlspecialchars($organization['logo_directory']) ?>" alt="Organization Logo" width="100" 
                                    <?php if (htmlspecialchars($organization['isActive']) != 1): ?>
                                        class="rounded-circle me-3 saturate-low">
                                    <?php else: ?>
                                        class="rounded-circle me-3">
                                    <?php endif; ?>
                                <div class="flex-grow-1 organization" data-organization-id="<?= htmlspecialchars($organization['id']) ?>">
                                    <h5 class="mb-1"><?= htmlspecialchars($organization['name']) ?>
                                        <?php if (htmlspecialchars($organization['isActive']) != 1): ?>
                                            <span class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill" style="font-size: 0.50em;">Deactivated</span>
                                        <?php endif; ?>
                                    </h5>
                                    <p class="mb-1 text-muted">
                                        <i class="bi bi-people-fill me-1"></i>
                                        600,003
                                    </p>
                                    <small class="text-muted">Updated October 01, 2024</small>
                                </div>
                                <!-- Dropdown button and menu -->
                                <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown">
                                    <i class="bi bi-three-dots"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end" 
                                    data-college-id="<?= htmlspecialchars($collegeId) ?>" 
                                    data-organization-id="<?= htmlspecialchars($organization['id']) ?>"
                                    data-organization-name="<?= htmlspecialchars($organization['name']) ?>"
                                >
                                    <li><a class="dropdown-item setPrimary" href="#">Set as Primary Organization</a></li>
                                    <!-- Dynamic Activate & Deactivate  Dropdown-->
                                    <li><a class="dropdown-item 
                                        <?php if (htmlspecialchars($organization['isActive']) != 1): ?>
                                            activate" href="#">Activate</a></li>
                                        <?php else: ?>
                                            deactivate" href="#">Deactivate</a></li>
                                        <?php endif; ?>
                                    <li><a class="dropdown-item delete" href="#">Delete</a></li>
                                </ul> 
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
        <?php endif; ?>

</div>

