<?php
session_start();

$Errors = $_SESSION['Errors'] ?? [];
$LoginInfo = $_SESSION['LoginInfo'] ?? [];

unset($_SESSION['Errors']);
unset($_SESSION['LoginInfo']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WMSU PayNet</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>

    <nav class="navbar">
        <div class="nav-logo">
            <img src="/images/wmsu_logo.png" alt="WMSU Logo">
            <span>WMSU PayNet</span>
        </div>
    </nav>
    <div class="background">
        <div class="login-container">
            <div class="logo">
                <img src="/images/wmsu_logo.png" alt="WMSU Logo">
            </div>
            <form class="login-form" action="account/login.logic.php" method="post">
                <?php if(!empty($Errors['loginError'])): ?>
                    <span class="error" style="color: red;"><?= htmlspecialchars($Errors['loginError']) ?></span><br>
                <?php endif; ?>

                <div class="form-group">
                    <label for="email">Email / Username</label>
                    <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($LoginInfo['email'] ?? $LoginInfo['username'] ?? ''); ?>" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="form-options">
                    <input type="checkbox" id="terms">
                    <label for="terms">Terms and Conditions</label>
                    <a href="#">Forgot Password</a>
                </div>
                <button type="submit">Login</button><br>
                <p>
                    Don’t have an account? <a href="#"><u>Register Here</u></a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
