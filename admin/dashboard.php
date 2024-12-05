<?php
    session_start();

    if(isset($_SESSION['account'])){
        if ($_SESSION['account']['role'] === 'Student'){
            header("Location: ../student/dashboard.php");
        }
        
        if ($_SESSION['account']['role'] === 'CollegeAdmin'){
            header("Location: ../college/dashboard.php");
        }
        
        if ($_SESSION['account']['role'] === 'OrganizationAdmin'){
            header("Location: ../organization/dashboard.php");
        }
    } else {
        header("Location: ../login.php");
    }
    require_once '../organization/includes/head.php';
?>

<body id="dashboard">
    <div class="wrapper">
        <?php
            require_once '../admin/includes/topnav.php';
            require_once '../admin/includes/sidebar.php';
        ?>
        <div class="content-page px-3">
            <!-- dynamic content here -->
        </div>
    </div>
    <?php
        require_once '../admin/includes/footer.php';
    ?>
</body>
</html>