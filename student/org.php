  <?php
        require_once '../student/includes/head.php';
  ?>
<body>
    <!-- Header -->
    <?php 
       require_once '../student/includes/topnav.php';
       ?>

    <!-- Back Button and Page Title -->
    <div class="container">
        <div class="back-title">
            <a href="./dashboard.php" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2>Organizations</h2>
        </div>

        <!-- Cards Section -->
        <div class="cards">
            <!-- Card 1 -->
            <div class="Box">
            <div class="Box-header">
                <h6 class="Box-title">GENDER <br> CLUB</h6>
                <h1 class="Box-count">1</h1>
            </div>
            <div class="Box-footer-left status pending">Pending <a href="#">view</a></div>
            </div>

            <!-- Box 2 -->
            <div class="Box">
            <div class="Box-header">
                <h5 class="Box-title">CCS-CSC </h5>
                <h1 class="Box-count">2</h1>
            </div>
             <div class="Box-footer-left status pending">Pending <a href="./fee.php">view</a></div>
            </div>

            <!-- Box 3 -->
            <div class="Box">
            <div class="Box-header">
                <h5 class="Box-title">PHICS </h5>
                <h1 class="Box-count">1</h1>
            </div>
            <div class="Box-footer-left status pending">Success <a href="./refund.php">view</a></div>
            </div>

            <!-- Box 4 -->
            <div class="Box Due">
            <div class="Box-header">  
                <h6 class="Box-title">VENOM <br> PUBLICATION</h6>
                <h1 class="Box-count-1">1</h1>
            </div>
             <div class="Box-footer-left status due">Due <a href="./due.php">view</a></div>
            </div>
        </div>
    </div>
</body>
</html>
