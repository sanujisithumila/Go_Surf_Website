<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="./assets/surf_img/head_logo.png"/>
    <link rel="javascript" href="app.js">
</head>
<body>
    <section class="sub-header-aboutus" style="background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(./assets/surf_img/about.webp);">
        <nav id="navbar" class="fixed">
            <a href="index.php"><img src="./assets/surf_img/logo.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php" class="click-animation-1">HOME</a></li>
                    <li><a href="boards.php" class="click-animation-1">BOARDS</a></li>
                    <li><a href="locations.php" class="click-animation-1">LOCATIONS</a></li>
                    <li><a href="about.php" style="color: red;" class="click-animation-1">ABOUT US</a></li>
                    <li><a href="contact.php" class="click-animation-1">CONTACT US</a></li>
                    <li class="login"><a href="login.php" class="login-button click-animation-1">LOGIN</a></li>
                    <li class="logout"><a href="./php_processes/logout_process.php" class="logout-button click-animation-1"></a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1 class="about-h1">About Us</h1>
        <p style="color: #ffffff81">We are the embodiment of the sun, sea, and surf culture that defines the beauty of Sri Lanka</p><br>
    </section>

    <!-------About Us------->
    <section class="about-us">
        <div class="row">
            <div class="about-col">
                <h1>We are the Best Sri Lankan Surfing Platform</h1>
                <p>Welcome to GO-SURF.LK, your gateway to the thrilling world of surfing in the stunning island nation of Sri Lanka.At GO-SURF.LK, we are more than just a surfing platform; we are surf enthusiasts dedicated to sharing the joy of riding the waves along the picturesque shores of Sri Lanka. Our journey began with a profound love for the ocean and a passion for adventure.</p><br><br><br>
                <h2><u>Our Story</u></h2>
                <p>GO-SURF.LK was born out of a deep love for the ocean and a passion for riding the waves. Our journey started on the sun-kissed shores of Sri Lanka, where we fell in love with the perfect breaks, warm waters, and the vibrant surf culture that this island nation has to offer.</p><br>
            </div>
            <div class="about-col">
                <img src="./assets/surf_img/about-1.jpg">
                <h2><u>Our Mission</u></h2>
                <p>Our mission is to connect surfers, from beginners to experts, with the best surf experiences Sri Lanka has to offer. We aim to make the exhilarating sport of surfing accessible to all, while promoting responsible and sustainable practices that respect the environment.</p><br>
            </div>
        </div>
    </section>
    <h1 style="margin-left: 25px;">Frequently Asked Questions</h1>
    
    <section class="faq">
      <div class="question">Q: What surfing services do you offer?</div>
      <div class="answer">A: We offer surfing lessons for all skill levels, surfboard rentals, and guided surf tours.</div>
    </section>
  
    <section class="faq">
      <div class="question">Q: How can I book a surfing lesson?</div>
      <div class="answer">A: Booking a lesson is easy! Visit our website or contact us through email or phone to reserve your spot.</div>
    </section>
  
    <section class="faq">
      <div class="question">Q: Are your surfing facilities safe?</div>
      <div class="answer">A: Absolutely. We prioritize safety and follow strict protocols. Our instructors are trained to ensure a secure surfing experience.</div>
    </section>

    <!-------Footer------->
    <section class="footer">
        <h4>About Us</h4>
        <p style="color: black;">"Surfing Enthusiasts, Passionate Instructors: <br> At GO-SURF, we are more than just a surf rental service. We are a community of dedicated surfers and experienced instructors, committed to sharing our love for the ocean and the art of surfing. Whether you're a beginner catching your first wave or an experienced surfer seeking new challenges, join us for an unforgettable surfing adventure. Let's ride the waves together!" <br><br>Follow us on:</p>
        <div class="icons">
            <i class="fa fa-facebook"></i>
            <i class="fa fa-twitter"></i>
            <i class="fa fa-instagram"></i>
            <i class="fa fa-linkedin"></i>
        </div>
        <p style="color: black;">Made with <i class="fa fa-heart"></i> by Group 15 23.1 FOC - NSBM</p>
    </section>
    <!-------JavaScript for Toggle Menu------->
    <script>
        var navLinks = document.getElementById("navLinks");
        function showMenu()
        {
            navLinks.style.right = "0";
        }
        function hideMenu()
        {
            navLinks.style.right = "-200px";
        }
    </script>
    <!-------JavaScript for Nav Bar------->
    <script>
        var prevScrollpos = window.pageYOffset;
    
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-100px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>

<?php
if (isset($_COOKIE['user_id']) || isset($_SESSION['user_id'])) {
    echo "
    <script>
        var loginButton =  document.querySelector('.login-button');
        
        loginButton.innerHTML = '';

        var logoutButton = document.querySelector('.logout-button');

        logoutButton.innerHTML = 'LOGOUT';

        logoutButton.addEventListener('click', () => {
            window.location.href = './php_processes/logout_process.php';   
        });
    </script>

    <style>
        .nav-links ul .login::after {
            background: transparent;
        }
    </style>
    ";
} else {
    echo "
    <style>
        .nav-links ul .logout::after {
            background: transparent;
        }
    </style>
    ";
}
?>
</body>
</html>