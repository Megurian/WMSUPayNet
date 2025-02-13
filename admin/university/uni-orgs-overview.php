<?php
    require_once "../../tools/functions.php";
    require_once "../../database/autoload_classes.php";

    $organizationObj = new Organizations();

    $organizationId = isset($_GET['organization_id']) ? intval($_GET['organization_id']) : 0;
?>

<div class="container-fluid">
    <div class="modal-container"></div>

        <div class="top-section border-bottom">
            <div class="d-flex align-items-center py-3">

                <i class="fas fa-arrow-left back-button mx-4" ></i> 
               
                    <img src="../../images/gender_club.jpg" alt="Logo" width="40" height="40"  class="rounded-circle me-3">

                    <div class="d-flex flex-column">
                        <h5 class="club-title">Gender Club</h5>
                    </div>

            </div>
        </div>

        <div class="table-container">
            <div class="table-responsive">

                <div class="d-flex justify-content-between align-items-center mt-4 mb-2 ">
                    <h5> Admin </h5>
                    <button id="create-admin-uni" class="btn bgreen btn-sm"> Create Admin</button>
                </div>

                <table  class="table table-striped table-bordered mb-0">
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
            <div class="d-flex justify-content-between align-items-center mt-4 mb-2 ">
                    <h5> Fees </h5>
                    <button id="add-fee-uni" class="btn bgreen btn-sm"> Create Fee</button>
                </div>
                <table class="table table-striped table-bordered mb-0">
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
                            <td>Membership Fee</td>
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