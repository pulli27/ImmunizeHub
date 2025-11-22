
<?php
  session_start();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $f_name=$_POST['firstName'];
    $l_name=$_POST['lastName'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $passwd=$_POST['password'];
    $confirmPasswd = $_POST['confirmPassword'];
     
    
    // Validate passwords match
    if ($passwd !== $confirmPasswd) {
      $_SESSION['message'] = 'Passwords do not match.';
      header('Location: userReg.php');
      exit();
    }
    
     $con=new mysqli("localhost","root","","immunizehub");

     if($con->connect_error)
     {
        die("Connectiopn failed".$con->connect_error);
     }
     else {
         echo "Sucessful";
     }

      $query = $con->prepare("INSERT INTO patients (FirstName, LastName, contact, email, password) 
      VALUES (?, ?, ?, ?, ? )");
      $query->bind_param("sssss",  $f_name, $l_name, $phone, $email, $passwd);

      if ($query->execute()) {
        header('Location: login.php');
      } else {

      }

      $query->close();

    

    $con->close();
    exit();
  }
?> 


<!DOCTYPE html>
<html>
<head>
   
    <title>User Registration Page</title>
    <link rel="stylesheet" href="css/userReg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

    <header>
        <div class="header-container">
            <div class="logo">
                <img src="images/logo.jpg" alt="LOGO">
            </div>
            <nav class="navbar">
                <ul>
                    <li><a href="home.php" >Home</a></li>
                    <li><a href="about us.html">About Us</a></li>
                    <li><a href="#">Media</a></li>
                    <li><a href="faq.html">FAQs</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </nav>
            <div class="user-login">
                <i class="fas fa-user"></i>
                <a href="login.php" class="login-btn">Login</a>
            </div>
        </div>
    </header>
    

    <main>
        <section class="registration-section">
            <h2>Create an Account</h2>
            <form id="registrationForm" action="./userReg.php" method="POST">
            

                <input type="text" id="firstName" placeholder="First Name" name="firstName" required>
                <input type="text" id="lastName" placeholder="Last Name" name="lastName" required>
                <input type="tel" id="phone" placeholder="Phone Number" name="phone" required>
                <input type="email" id="email" placeholder="Email Address" name="email" required>
                <input type="password" id="password" placeholder="Password" name="password"required>
                <input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword"required>
                <button type="submit" id="registerBtn">Register</button>
            </form>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <div class="logo">
                <img src="images/logo.jpg" alt="LOGO" />
            </div>
            <div class="links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="about us.htm">About Us</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="faq.html">FAQs</a></li>
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

    
    
</body>
</html>
