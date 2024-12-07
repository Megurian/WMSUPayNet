<?php
      require_once '../student/includes/head.php';
 ?>
 <style>

.pay-container {
        width: 100%;
        height: 100px;
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .payment {
        box-sizing: border-box;
        background: url('../images/Payment.png') no-repeat center center;
        background-size: cover;
        width: 100%;
        height: 90vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    
    .done-btn {
        background-color: #093909;
        color: #fff;
        padding: 12px 32px;
        border: 1px solid #093909;
        border-radius: 6px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: all 0.3s ease;
        position: fixed;
        bottom: 160px;
        right: 47%;
        box-shadow: 0 4px 6px rgba(9, 57, 9, 0.2);
    }

    .done-btn:hover {
        background-color: #fff;
        color: #093909;
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(9, 57, 9, 0.3);
    }

    .done-btn:active {
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(9, 57, 9, 0.2);
    }

 </style>
 <body>
 <?php 
       require_once '../student/includes/topnav.php';
       ?>
    <div class="pay-container">
    </div>
       <div class="payment">
         <div class="done-btn" onclick="window.location.href='fee.php'">
            DONE
       </div>
    </div>
 </body>