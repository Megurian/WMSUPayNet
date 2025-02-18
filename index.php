<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayNet - Student Payment System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./index/css/style.css">
    
</head>
<body>
    <nav class="navbar">
    <div class="logo-container">
        <img src="index/logo.png" alt="WMSUPayNet Logo" style="height: 80px;">
        <span class="logo-text">SafeNet Solutions</span> 
    </div>
        <div class="nav-links">
            <a href="#hero">About</a>
            <a href="#services">Services</a>
            <a href="#testimonial">Testimonials</a>

            <a href="login.php">Login</a>
            <a href="#store" class="start-project-btn">Avail our System</a>
        </div>
    </nav>


    <div class="progress-container">
        <div class="progress-bar" id="progress-bar"></div>
    </div>

    <main class="hero" id="hero">

        <div class="hero-text">
            <h1>PayNet: An Integrated Web Platform for Payment Processing and Record Management</h1>
            <p>Our System solves problems by providing better and efficient payment and management system lessening the workload for student organization. </p>
            <a href="#start" class="start-project-btn">Avail our System</a>
        </div>
        <div class="hero-image">
            <img src="index/logo.png" alt="Hero Illustration">
        </div>
    </main>

    <section class="services" id="services">

    

    <div class="box-container">
        <div class="box">
        <i class="fas fa-clipboard"></i>
            <h3>Record Management</h3>
            <p> View and manage your fees and other transaction records easier !
            </p>
        </div>


        <div class="box">
        <i class="fas fa-shield"></i>
            <h3>Security</h3>
            <p> Security includes audit trails and session timeouts for more protection !
            </p>
        </div>
        <div class="box">
        <i class="fas fa-chart-simple"></i>
            <h3>Statistics and Reports</h3>
            <p>check statistics and reports and you can export certain data from a particular date!</p>
    </div>
 </section>



    <section class="testimonial-section" id="testimonial">
  
    <div class="grid">
    <div class="mycard text-center">
      <div class="content">
        <div class="text">
          <p>We develop a web-based online payment system that allows students to pay at their convenience and provide student organizations an efficient and reliable system that can handle management of records, validations, and collection of payment.</p>
        </div>
      </div>
      <div class="author">
        <div class="image">
          <img src="index/developer1.jpg" class="img-fluid">
        </div>
        <div class="details">
          <h2>Meg Ryan Gomez<br><span>Project Manager</span></h2>
        </div>
      </div>
    </div>
    <div class="mycard text-center">
      <div class="content">
        <div class="text">
          <p>Now you don't have to worry about forgetting to pay fees or losing your receipt! as doing so is in the hands of your fingertips <br><br><br><br></p>
        </div>
      </div>
      <div class="author">
        <div class="image">
          <img src="index/developer2.jpg" class="img-fluid">
        </div>
        <div class="details">
          <h2>Marverick Francisco<br><span>Developer</span></h2>
        </div>
      </div>
    </div>        
    <div class="mycard text-center">
      <div class="content">
        <div class="text">
          <p>With paynet, keeping track of payment fees coudn't be easier. The platform ensures that every payment is in order and at the same time is easy to navigate! <br><br><br> <br></p>
        </div>
      </div>
      <div class="author">
        <div class="image">
          <img src="index/developer5.jpg" class="img-fluid">
        </div>
        <div class="details">
          <h2>Ayana Jade Alejo<br><span>Business Analyst</span></h2>
        </div>
      </div>
    </div> 
  </div> 

</section>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-info">

                <h3>PayNet</h3>
                <div class="location-text">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>Western Mindanao State University, <br> Normal Road, Baliwasan, Zamboanga City, <br>7000 Zamboanga del Sur</p>
                </div>
                <div class="social-icons">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-tiktok"></i>
                    </a>
                </div>
            </div>
            <div class="footer-right">
                <div class="chat-section">
                    <h3>Need Help?</h3>
                    <div class="chat-avatars">
                        <img src="index/developer4.jpg" alt="Support Agent 1" class="avatar">
                        <img src="index/developer1.jpg" alt="Support Agent 2" class="avatar">
                        <img src="index/developer2.jpg" alt="Support Agent 3" class="avatar">
                        <img src="index/developer3.jpg" alt="Support Agent 4" class="avatar">
                        <img src="index/developer5.jpg" alt="Support Agent 5" class="avatar">
                    </div>
                    <p>Our support team is here to help!</p>
                    <a href="#" class="send-message-btn">Send Message</a>
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 PayNet. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>


<!--scroll progress bar-->
<script>
window.onscroll = function() { updateProgressBar(); };

function updateProgressBar() {
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    const scrollPercentage = (scrollTop / scrollHeight) * 100;
    document.getElementById("progress-bar").style.width = scrollPercentage + "%";
}

//anchor link

document.addEventListener("DOMContentLoaded", function () {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            const targetId = this.getAttribute("href").substring(1);
            const targetElement = document.getElementById(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80, 
                    behavior: "smooth"
                });
            }
        });
    });
});
