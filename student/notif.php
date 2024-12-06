  <?php
        require_once '../student/includes/head.php';
  ?>
<body>
    <div class="body">
    <?php 
       require_once '../student/includes/topnav.php';
       ?>

    <div class="notif-container">
    <!-- Notifications Section -->
    <main class="notifications">
      <div class="notifications-header">
        <div class="notif-back-title">
            <a href="./dashboard.php" class="back-btn">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h2>Notifications</h2>
        </div>
        <button class="mark-all" aria-label="Mark all notifications as read">
          <i class="fas fa-check-circle"></i> Mark All as Read
        </button>
      </div>

      <ul class="notifications-list">
        <!-- Notification Item -->
        <li class="notification-item">
          <p class="notification-text">
            <i class="fas fa-info-circle"></i> You have an upcoming organization fee due
          </p>
          <div class="notification-meta">
            <span class="time"><i class="far fa-clock"></i> 3 days 17 hours ago</span>
            <a href="#" class="view-link">View full notification
            </a>
          </div>
        </li>

        <li class="notification-item">
          <p class="notification-text">
            <i class="fas fa-check-circle"></i> Promissory Note Accepted
          </p>
          <div class="notification-meta">
            <span class="time"><i class="far fa-clock"></i> 3 days 17 hours ago</span>
            <a href="#" class="view-link">View full notification
            </a>
          </div>
        </li>

        <li class="notification-item">
          <p class="notification-text">
            <i class="fas fa-times-circle"></i> Promissory Note Rejected
          </p>
          <div class="notification-meta">
            <span class="time"><i class="far fa-clock"></i> 3 days 17 hours ago</span>
            <a href="#" class="view-link"> View full notification
            </a>
          </div>
        </li>

          <li class="notification-item">
            <p class="notification-text">
              <i class="fas fa-info-circle"></i> You have an upcoming organization fee due
            </p>
            <div class="notification-meta">
              <span class="time"><i class="far fa-clock"></i> 3 days 17 hours ago</span>
              <a href="#" class="view-link"> View full notification
              </a>
            </div>
          </li>
      </ul>
    </main>
    <div class="help">
    <i class="fas fa-question-circle"></i>
  </div>
  </div>
</body>
</html>
