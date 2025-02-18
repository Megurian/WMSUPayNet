<?php
        require_once '../student/includes/head.php';
        require_once '../student/includes/topnav.php';
?>
<body>
    <div class="body">

        <main class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Breadcrumb -->
                    <div class="d-flex align-items-center mb-4">
                        <a href="setting.php" class="text-decoration-none d-flex align-items-center" style="color: #093909;">
                            <i class="fas fa-arrow-left me-2" style="font-size: 20px;"></i>
                            <span class="fw-semibold">SETTINGS</span>
                        </a>
                        <span class="ms-2 fw-semibold" style="color: #093909;">| Password</span>
                    </div>

                    <!-- Verification Section -->
                    <div class="card shadow-sm">
                        <div class="card-body p-5 text-center">
                            <h2 class="mb-3" style="color: #093909;">Enter 6-Digit Code</h2>
                            <p class="text-muted mb-4">To set your password, enter the 6-digit code sent to your email address.</p>
                            
                            <form class="verification-form">
                                <div class="d-flex justify-content-center gap-2 mb-4">
                                    <input type="text" class="form-control text-center fw-bold" 
                                           style="width: 50px; height: 50px; font-size: 1.5em; border: 2px solid #dee2e6;"
                                           maxlength="1" pattern="[0-9]" inputmode="numeric">
                                    <input type="text" class="form-control text-center fw-bold" 
                                           style="width: 50px; height: 50px; font-size: 1.5em; border: 2px solid #dee2e6;"
                                           maxlength="1" pattern="[0-9]" inputmode="numeric">
                                    <input type="text" class="form-control text-center fw-bold" 
                                           style="width: 50px; height: 50px; font-size: 1.5em; border: 2px solid #dee2e6;"
                                           maxlength="1" pattern="[0-9]" inputmode="numeric">
                                    <input type="text" class="form-control text-center fw-bold" 
                                           style="width: 50px; height: 50px; font-size: 1.5em; border: 2px solid #dee2e6;"
                                           maxlength="1" pattern="[0-9]" inputmode="numeric">
                                    <input type="text" class="form-control text-center fw-bold" 
                                           style="width: 50px; height: 50px; font-size: 1.5em; border: 2px solid #dee2e6;"
                                           maxlength="1" pattern="[0-9]" inputmode="numeric">
                                    <input type="text" class="form-control text-center fw-bold" 
                                           style="width: 50px; height: 50px; font-size: 1.5em; border: 2px solid #dee2e6;"
                                           maxlength="1" pattern="[0-9]" inputmode="numeric">
                                </div>
                                <button type="button" class="btn mb-3" 
                                        style="background-color: #093909; color: white; min-width: 150px;"
                                        onclick="openModal()">Verify</button>
                            </form>
                            <a href="#" class="text-decoration-none" style="color: #093909;">Resend Code</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Password Change Modal -->
        <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="passwordModalLabel" style="color: #093909;">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="password-form">
                            <div class="mb-3">
                                <label for="password" class="form-label">Enter Password</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>

                            <div class="mb-4">
                                <h6 class="mb-3">Your password must have at least:</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle me-2" style="color: #093909;"></i>
                                        8 Characters (20 Max)
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle me-2" style="color: #093909;"></i>
                                        1 Letter and 1 Number
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check-circle me-2" style="color: #093909;"></i>
                                        1 special character ( Example: # ? ! $ & @ )
                                    </li>
                                </ul>
                            </div>

                            <div class="mb-4">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" required>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn" data-bs-dismiss="modal"
                                        style="border: 1px solid #093909; color: #093909;">Cancel</button>
                                <button type="submit" class="btn" 
                                        style="background-color: #093909; color: white;">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Auto-tab for code inputs
        const codeInputs = document.querySelectorAll('.verification-form input');
        codeInputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                if (this.value.length === 1) {
                    if (index < codeInputs.length - 1) {
                        codeInputs[index + 1].focus();
                    }
                }
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && !this.value) {
                    if (index > 0) {
                        codeInputs[index - 1].focus();
                    }
                }
            });
        });

        // Modal functions
        const modal = new bootstrap.Modal(document.getElementById('passwordModal'));

        function openModal() {
            modal.show();
        }

        // Form submission
        document.querySelector('.password-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            // Add your password update logic here
            alert('Password updated successfully!');
            modal.hide();
        });
    </script>
</body>
</html>
