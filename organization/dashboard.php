<?php
    session_start();

    if(isset($_SESSION['account'])){
        if ($_SESSION['account']['role'] === 'Student'){
            header("Location: ../student/dashboard.php");
        }
        
        if ($_SESSION['account']['role'] === 'SuperAdmin'){
            header("Location: ../admin/dashboard.php");
        }
        
        if ($_SESSION['account']['role'] === 'CollegeAdmin'){
            header("Location: ../college/dashboard.php");
        }
    } else {
        header("Location: ../login.php");
    }
    require_once '../organization/includes/head.php';
?>

<body id="dashboard">
    <div class="wrapper">
        <?php
            require_once '../organization/includes/topnav.php';
            require_once '../organization/includes/sidebar.php';
        ?>
        <div class="content-page px-3">
            <!-- dynamic content here -->
        </div>
    </div>
    <?php
        require_once '../organization/includes/footer.php';
    ?>
</body>
</html>