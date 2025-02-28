<?php
    require_once "../../tools/functions.php";
    require_once "../../database/autoload_classes.php";

    $organizationObj = new Organizations();

    $organizationId = isset($_GET['organization_id']) ? intval($_GET['organization_id']) : 0;
?>

<div class="container-fluid">
    <div class="modal-container"></div>

        <div class="top-section border-bottom">
            <div class="d-flex align-items-center">

                <i class="fas fa-arrow-left back-button mx-4" onclick="goBack()"></i> 
                <?php foreach ($organizationObj->getAllOrganizationInfoById($organizationId) as $organization): ?>
                    <img src="<?= htmlspecialchars($organization['logo_directory']) ?>" alt="Logo" width="40" height="40"  class="rounded-circle me-3">

                    <div class="d-flex flex-column mx-2 mt-3">
                        <h5 class="club-title"><?= htmlspecialchars($organization['name']) ?></h5>
                        <h6><span style="color: #004d00;">College of Computing Studies</span></h6>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>

        <div class="table-container">
            <div class="table-responsive">

                <div class="d-flex justify-content-between align-items-center mt-4 mb-2 ">
                    <h5> Admin </h5>
                    <button id="create-admin" class="btn bgreen btn-sm"> Create Admin</button>
                </div>

                <table id="table-all" class="table table-striped table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Admin Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Permission</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Princess Ginon</td>
                            <td>admin1@wmsuh</td>
                            <td>President</td>
                            <td>All</td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="table-responsive mt-5 border-top">
                <h5 class="mt-3"> Fee </h5>

                <table id="table-all" class="table table-striped table-bordered mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Semester</th>
                            <th>Required</th>
                            <th>School Year</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Gender Club</td>
                            <td>50.00</td>
                            <td>1</td>
                            <td>Required</td>
                            <td>2023-2024</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

</div>