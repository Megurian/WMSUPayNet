<?php
    require_once "../../tools/functions.php";
    require_once "../../database/autoload_classes.php";

    session_start();
    $organizationObj = new Organizations();
?>

<style>
    .add-btn {
        display: flex;
        justify-content: right;
        align-items: center;
    }

    .floating-btn {
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

    .floating-btn:hover {
       background-color: #093909;
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

    .card-bg {
        filter: saturate(0.01);
    }
</style>


<div class="container my-4">
    <div class="modal-container"></div>
        <div class="add-btn">
            <a id="add-organization" href="#" class="floating-btn">
                <i class="bi bi-plus"></i>
            </a>
        </div>
    
    <!-- Card -->
    <?php
        $organizations = $organizationObj->getAllOrganizationById($_SESSION['account']['college_id']);
        if (empty($organizations)): ?>
            <div style="text-align:center; margin-top:20px;">No Organizations</div>
        <?php else: ?>
            <!-- Display Primary Organization First -->
            <?php foreach ($organizations as $organization): ?>
                <?php if (htmlspecialchars($organization['isPrimary']) == 1): ?>
                    <div class="card shadow-sm mb-4 mt-4">
                        <div class="card-body d-flex align-items-center
                            <?php if (htmlspecialchars($organization['isActive']) != 1): ?>
                                card-bg">
                            <?php else: ?>
                                ">
                            <?php endif; ?>

                            <!-- Logo -->
                            <img src="<?= htmlspecialchars($organization['logo_directory']) ?>" alt="Organization Logo" width="100" class="rounded-circle me-3">
                            
                            <!-- Organization Name and Status -->
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
                                data-organization-id="<?= htmlspecialchars($organization['id']) ?>"
                                data-organization-name="<?= htmlspecialchars($organization['name']) ?>"
                            >
                                <li><a class="dropdown-item edit-org" href="#">Edit</a></li>
                                <li><a class="dropdown-item delete-org" href="#">Delete</a></li>
                            </ul> 
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- Then Display Non-Primary Organizations -->
            <?php foreach ($organizations as $organization): ?>
                <?php if (htmlspecialchars($organization['isPrimary']) != 1): ?>
                    <div class="card shadow-sm mb-4 mt-4">
                        <div class="card-body d-flex align-items-center
                            <?php if (htmlspecialchars($organization['isActive']) != 1): ?>
                                card-bg">
                            <?php else: ?>
                                ">
                            <?php endif; ?>

                            <!-- Logo -->
                            <img src="<?= htmlspecialchars($organization['logo_directory']) ?>" alt="Organization Logo" width="100" 
                                <?php if (htmlspecialchars($organization['isActive']) != 1): ?>
                                    class="rounded-circle me-3 saturate-low">
                                <?php else: ?>
                                    class="rounded-circle me-3">
                                <?php endif; ?>

                            <!-- Organization Name and Status -->
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
                                data-organization-id="<?= htmlspecialchars($organization['id']) ?>"
                                data-organization-name="<?= htmlspecialchars($organization['name']) ?>"
                            >
                                <li><a class="dropdown-item edit-org" href="#">Edit</a></li>
                                <li><a class="dropdown-item delete-org" href="#">Delete</a></li>
                            </ul> 
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        
</div>