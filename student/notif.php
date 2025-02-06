<?php
        require_once '../student/includes/head.php';
?>
<body>
    <div class="container col-md-8 mx-auto">
        <div class="body">
        <?php 
           require_once '../student/includes/topnav.php';
           ?>

        <div class="notif-container" style="margin-top: 100px;">
        <!-- Notifications Section -->
        <main class="notifications">
          <div class="notifications-header d-flex justify-content-between align-items-center">
            <div class="notif-back-title">
                <a href="./dashboard.php" class="btn btn-link back-btn">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h2 class="d-inline-block">Notifications</h2>
            </div>
            <button class="btn btn-outline-primary mark-all" aria-label="Mark all notifications as read">
              <i class="fas fa-check-circle"></i> Mark All as Read
            </button>
          </div>

          <ul class="list-group notifications-list">
            <!-- Notification Item -->
            <li class="list-group-item notification-item">
              <p class="notification-text">
                <i class="fas fa-info-circle"></i> You have an upcoming organization fee due
              </p>
              <div class="notification-meta">
                <span class="time"><i class="far fa-clock"></i> 3 days 17 hours ago</span>
                <a href="#" class="view-link text-decoration-none">View full notification</a>
              </div>
            </li>

            <li class="list-group-item notification-item">
              <p class="notification-text">
                <i class="fas fa-check-circle"></i> Promissory Note Accepted
              </p>
              <div class="notification-meta">
                <span class="time"><i class="far fa-clock"></i> 3 days 17 hours ago</span>
                <a href="#" class="view-link text-decoration-none">View full notification</a>
              </div>
            </li>

            <li class="list-group-item notification-item">
              <p class="notification-text">
                <i class="fas fa-times-circle"></i> Promissory Note Rejected
              </p>
              <div class="notification-meta">
                <span class="time"><i class="far fa-clock"></i> 3 days 17 hours ago</span>
                <a href="#" class="view-link text-decoration-none">View full notification</a>
              </div>
            </li>

            <li class="list-group-item notification-item">
              <p class="notification-text">
                <i class="fas fa-info-circle"></i> You have an upcoming organization fee due
              </p>
              <div class="notification-meta">
                <span class="time"><i class="far fa-clock"></i> 3 days 17 hours ago</span>
                <a href="#" class="view-link text-decoration-none">View full notification</a>
              </div>
            </li>
          </ul>
        </main>
        <div class="help">
        <i class="fas fa-question-circle"></i>
      </div>
      </div>
    </div>
</body>
</html>
