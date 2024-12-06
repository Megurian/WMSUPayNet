<?php
        require_once '../student/includes/head.php';
    ?>
<body>
    <div class="body">

    <?php 
       require_once '../student/includes/topnav.php';
    ?>

          <div class="settings-container">
        <div class="content">

            <div class="back-title">
                <a href="./dashboard.php" class="back-btn">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h2>Settings</h2>
            </div> 

            <section class="account-section">
                <h2>Account</h2>
                <div class="item"><i class="fas fa-user"></i> <a href="./Accview.php">Account Information</a> </div>
                <div class="item"><i class="fas fa-key"></i> <a href="./password.php"> Change Password </a> </div>
            </section><br>
            <section class="support-section">
                <h2>Support & Report</h2>
                <div class="item"><i class="fas fa-comment-dots"></i><a href="#"> Feedback </a> </div>
                <div class="item"><i class="fas fa-question-circle"></i><a href="#"> Help Center</a> </div>
                <div class="item"><i class="fas fa-shield-alt"></i><a href="#"> Safety & Privacy Center</a> </div>
                <div class="item"><i class="fas fa-exclamation-triangle"></i><a href="./report.php"> Report A Problem </a> </div>
            </section>
        </div>

        <footer class="logout">
            <a href="../login.php" class="back-bttn"><i class="fas fa-sign-out-alt"></i></a> Log Out
        </footer>
    </div>
</div>
</body>
</html>
