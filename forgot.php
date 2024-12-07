<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - WMSUPayNet</title>
    <link rel="stylesheet" href="./css/forgot.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-logo">
            <img src="./images/wmsu_logo.png" alt="WMSU Logo">
            <span>WMSUPayNet</span>
        </div>
    </nav>

    <div class="background">
        <div class="login-container">
            <form id="forgotPasswordForm">
                <h1>Forgot Password</h1>
                <div class="form-group">
                    <label for="studentId">Student ID</label>
                    <input type="text" id="studentId" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" required>
                </div>
                <button type="submit">Proceed</button>
                <div class="form-options">
                    <a href="./login.php">Back to Login</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Verification Code Modal -->
    <div class="modal" id="verificationModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Enter Verification Code</h5>
                <span class="close-btn">&times;</span>
            </div>
            <div class="modal-body">
                <form id="verificationForm">
                    <div class="form-group">
                        <label for="verificationCode">Verification Code</label>
                        <input type="text" id="verificationCode" required>
                        <small class="text-muted">Please check your email for the verification code</small>
                    </div>
                    <button type="submit">Verify</button>
                </form>
            </div>
        </div>
    </div>

    <!-- New Password Modal -->
    <div class="modal" id="newPasswordModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Set New Password</h5>
                <span class="close-btn">&times;</span>
            </div>
            <div class="modal-body">
                <form id="newPasswordForm">
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" id="newPassword" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" id="confirmPassword" required>
                    </div>
                    <button type="submit">Reset Password</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Modal handling
        function showModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden'; // Prevent background scrolling
        }

        function hideModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.style.display = 'none';
            document.body.style.overflow = ''; // Restore scrolling
        }

        // Close button handlers
        document.querySelectorAll('.close-btn').forEach(btn => {
            btn.onclick = function() {
                hideModal(this.closest('.modal').id);
            }
        });

        // When clicking outside modal, close it
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                hideModal(event.target.id);
            }
        }

        // Form submissions
        document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            showModal('verificationModal');
        });

        document.getElementById('verificationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            hideModal('verificationModal');
            showModal('newPasswordModal');
        });

        document.getElementById('newPasswordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const newPassword = document.getElementById('newPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (newPassword !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            alert('Password reset successful!');
            window.location.href = './login.php';
        });
    </script>
</body>
</html>