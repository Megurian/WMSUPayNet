<?php
    session_start();
?>

<!-- Modal -->
<div class="modal fade" id="modal-add-organization" tabindex="-1" aria-labelledby="modal-add-organizationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-add-organizationLabel"> Organization Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  id="form-add-organization" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row mb-3">

                            <input type="hidden" name="college_id" value="<?= htmlspecialchars($_SESSION['account']['college_id']); ?>">

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="logo">Upload Logo</label>
                                    <div class="logo-container mt-2" id="upload">
                                        <input type="file" name="logo" id="logo-input" accept="image/*">
                                        <img id="logo-preview" src="#" alt="Logo Preview" style="display: none;" >
                                        <i class="fas fa-plus plus-icon"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-7 mt-4">
                                <div class="col-md-9 mb-3">
                                    <div class="form-group">
                                        <label for="organizationName">Organization Name:</label>
                                        <input type="text" class="form-control" id="organizationName" name="organizationName" placeholder="Enter Organization Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2 mt-4">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea type="text " rows="4" maxlength="255" class="form-control" id="description" name="description" placeholder="Description"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="buttons">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn bgreen">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>