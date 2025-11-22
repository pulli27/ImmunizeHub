<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/admin.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Admin Dashboard</title>
</head>

<header>
    <div class="header-container">
        <div class="logo">
            <img src="images/lg.jpg" alt="LOGO">
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="home.php" >Home</a></li>
                <li><a href="about us.html">About Us</a></li>
                <li><a href="#">Media</a></li>
                <li><a href="faq.html">FAQ's</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
        <div class="user-login">
            <i class="fas fa-user"></i>
            <a href="login.php" class="login-btn">Logout</a>
        </div>
    </div>
</header>
<hr>
<br><br><br>
<body>
<div class="dashboard-container">
    <h1>DASHBOARD</h1>
    <div class="dashboard-grid">
         <div class="card">
            
            <h2>Doctors & Nurses</h2>
            <img src="images/vaccine9.png" width="200" height="200"  alt="Doctors & Nurses">
            <a href="#" class="learn-more-btn">Learn more &rarr;</a>
                 
        </div> 
        <div class="card">
           
            <h2>Booking Details</h2>
             <img src="images/vaccine12.jpg" width="300" height="200"  alt="Booking Details"> 
            <a href="bookingdetail.php" class="learn-more-btn">Learn more &rarr;</a>
        </div>
        <div class="card">
             
            <h2>Suppliers</h2>
            <img src="images/vaccine13.jpg" width="200" height="200" alt="Suppliers">  
            <a href="order_form.php" class="learn-more-btn">Learn more &rarr;</a>
        </div>
        
    </div>

   
   

</div>
</body>


<footer>
    <div class="footer-container">
        <div class="logo">
            <img src="images/lg.jpg" alt="LOGO" />
        </div>
        <div class="links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="about us.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="faq.html">FAQ's</a></li>
                <li><a href="feedback.html">Feedback</a></li>
            </ul>
        </div>
        <div class="contact">
            <h3>Immunize Hub</h3>
            <p><i class="fas fa-map-marker-alt"></i> 21 North tank road, Colombo</p>
            <p><i class="fas fa-phone"></i> (+94) 712 406 222</p>
            <p><i class="fas fa-envelope"></i> immunizehub@gmail.com</p>
        </div>
        <div class="media">
            <h3>  Follow Us On</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a>
                <a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
                <a href="https://lk.linkedin.com"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </div>
    <hr>
    <div class="copyright">
        <p>Copyright © 2024 <a href="home.php">Website</a>. All rights reserved.</p>
    </div>
</footer>

</html>