    <?php
        require_once '../student/includes/head.php';
    ?>
    <style>
        .verification-section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 1000px;
            margin: 20px auto;
        }

        .verification-content {
            padding: 20px;
            text-align: center;
        }

        .verification-content h2 {
            color: #093909;
            margin-bottom: 10px;
            font-size: 1.8em;
        }

        .verification-content p {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1em;
        }

        .code-input {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 30px;
        }

        .code-input input {
            width: 50px;
            height: 50px;
            text-align: center;
            font-size: 1.5em;
            border: 2px solid #ccc;
            border-radius: 8px;
            background: #f8f9fa;
            transition: all 0.3s;
        }

        .code-input input:focus {
            border-color: #093909;
            outline: none;
            background: #fff;
        }

        .verify-btn {
            background-color: #093909;
            color: #fff;
            padding: 12px 40px;
            border: 1px solid #093909;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
            max-width: 150px;
            margin: 0 auto;
            height: 40px;
        }

        .verify-btn:hover {
            background-color: #fff;
            color: #093909;
        }

        .resend-code {
            color: #093909;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .resend-code:hover {
            color: #0c4c0c;
            text-decoration: underline;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            padding: 10px;
            font-size: 16px;
            font-weight: 600;
            color: #093909;
            margin-bottom: 20px;
            margin-left: 25px;
        }

        .breadcrumb a {
            color: #093909;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 20px;
        }

        .breadcrumb i {
            font-size: 22px;
        }

        .breadcrumb span {
            margin-left: 8px;
            color: #666;
            font-weight: normal;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            overflow-y: auto;
        }

        .modal-content {
            background-color: #fff;
            margin: 150px auto;
            padding: 30px;
            border-radius: 8px;
            width: 90%;
            max-width: 500px;
            position: relative;
        }

        .modal-title {
            color: #093909;
            margin-bottom: 25px;
            font-size: 1.5em;
            font-weight: 600;
        }

        .password-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .password-input {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .password-input label {
            color: #333;
            font-weight: 500;
        }

        .password-input input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .password-input input:focus {
            border-color: #093909;
            outline: none;
        }

        .password-requirements {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            margin-top: 10px;
        }

        .password-requirements h3 {
            color: #093909;
            margin-bottom: 10px;
            font-size: 14px;
            font-weight: 600;
        }

        .requirements-list {
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 13px;
            color: #666;
        }

        .requirements-list li {
            margin-bottom: 5px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .requirements-list li i {
            color: #093909;
        }

        .modal-buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .save-btn, .cancel-btn {
            padding: 10px 24px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .save-btn {
            background-color: #093909;
            color: #fff;
            border: 1px solid #093909;
        }

        .save-btn:hover {
            background-color: #fff;
            color: #093909;
        }

        .cancel-btn {
            background-color: #fff;
            color: #093909;
            border: 1px solid #093909;
        }

        .cancel-btn:hover {
            background-color: #f5f5f5;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #666;
        }

        .close:hover {
            color: #333;
        }
    </style>

<body>
    <div class="container">
    <?php 
       require_once '../student/includes/topnav.php';
       ?>

        <section class="settings">
            <div class="breadcrumb">
                <a href="setting.php"><i class="fas fa-arrow-left"></i> SETTINGS </a> <span>| Password</span>
            </div>

            <div class="verification-section">
                <div class="verification-content">
                    <h2>Enter 6-Digit Code</h2>
                    <p>To set your password, enter the 6-digit code sent to your email address.</p>
                    <form class="verification-form">
                        <div class="code-input">
                            <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric">
                            <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric">
                            <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric">
                            <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric">
                            <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric">
                            <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric">
                        </div>
                        <button type="button" class="verify-btn" onclick="openModal()">Verify</button>
                    </form><br>
                    <a href="#" class="resend-code">Resend Code</a>
                </div>
            </div>
        </section>
    </div>

    <!-- Password Change Modal -->
    <div id="passwordModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 class="modal-title">Change Password</h2>
            <form class="password-form">
                <div class="password-input">
                    <label>Enter Password</label>
                    <input type="password" id="password" required>
                </div>

                <div class="password-requirements">
                    <h3>Your password must have at least:</h3>
                    <ul class="requirements-list">
                        <li><i class="fas fa-check-circle"></i> 8 Characters (20 Max)</li>
                        <li><i class="fas fa-check-circle"></i> 1 Letter and 1 Number</li>
                        <li><i class="fas fa-check-circle"></i> 1 special character ( Example: # ? ! $ & @ )</li>
                    </ul>
                </div>

                <div class="password-input">
                    <label>Confirm Password</label>
                    <input type="password" id="confirmPassword" required>
                </div>

                <div class="modal-buttons">
                    <button type="button" class="cancel-btn" onclick="closeModal()">Cancel</button>
                    <button type="submit" class="save-btn">Save</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Auto-tab for code inputs
        const codeInputs = document.querySelectorAll('.code-input input');
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
        const modal = document.getElementById('passwordModal');

        function openModal() {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
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
            closeModal();
        });
    </script>
</body>
</html>
