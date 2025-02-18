<?php
        require_once '../student/includes/head.php';
        require_once '../student/includes/topnav.php';
    ?>

<body>
    <div class="body">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-success">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Report a Problem</h2>
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="payment">
                                        <label class="form-check-label" for="payment">Payment Issues</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="access">
                                        <label class="form-check-label" for="access">Access Control Problems</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="performance">
                                        <label class="form-check-label" for="performance">System Performance</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="fee">
                                        <label class="form-check-label" for="fee">Fee Structure Errors</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="profile">
                                        <label class="form-check-label" for="profile">Profile Issues</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="ui">
                                        <label class="form-check-label" for="ui">User Interface Issues</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="data">
                                        <label class="form-check-label" for="data">Student Data Errors</label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="other">
                                        <label class="form-check-label" for="other">Other organization-specific permissions</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label">Kindly describe the issue below:</label>
                                <textarea class="form-control" id="description" rows="5"></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="attachment" class="form-label">Attachments:</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="attachment" style="border: 1px solid #d9d9d9;">
                                    <span class="input-group-text"><i class="fas fa-paperclip" style="border: 1px solid #d9d9d9;"></i></span>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success px-4" style="background-color: #093909;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
