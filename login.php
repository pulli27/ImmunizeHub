
<?php
  session_start();

  if($_SERVER['REQUEST_METHOD'] == 'POST') {


    $role=$_POST['userRole'];
    $email=$_POST['username'];
    $passwd=$_POST['password'];

    require 'config.php';

    if ($role === "supplier") {  
        $query = $con->prepare("SELECT * FROM suppliers WHERE con_email = ? AND password = ?");
        $query->bind_param("ss", $email, $passwd);
  
        if ($query->execute()) {
            $result = $query->get_result();
   
            if ($result->num_rows > 0) {
                $_SESSION['userEmail'] = "$email";
              
                header('Location:./supplierProfile.php');
                exit();
            } else {
                echo "<h1>no account found</h1>"; // Implement Error Page
            }
        } else {
            echo "Error : $query->error";
        }
  
        $query->close();
  
      } else if ($role === "patient") {
        $query = $con->prepare("SELECT * FROM patients WHERE email = ? AND password = ?");
        $query->bind_param("ss", $email, $passwd);
  
        if ($query->execute()) {
            $result = $query->get_result();
  
            if ($result->num_rows > 0) {
                $_SESSION['userEmail'] = "$email";
                header('Location: ./patientProfile.php'); 
                exit();
            } else {
                $_SESSION['message'] = 'Invalid email or password.';
            }
        } else {
            $_SESSION['message'] = "Error: " . $query->error;
        }
  
        $query->close();
    }

        else if ($role === "nurse") {
            $query = $con->prepare("SELECT * FROM userrege WHERE email = ? AND password = ?");
            $query->bind_param("ss", $email, $passwd);
      
            if ($query->execute()) {
                $result = $query->get_result();
      
                if ($result->num_rows > 0) {
                   
                    header('Location: ./nurse-dashboard.html'); 
                    exit();
                } else {
                    $_SESSION['message'] = 'Invalid email or password.';
                }
            } 
            else {
                $_SESSION['message'] = "Error: " . $query->error;
            }
      
            $query->close();
        }
        else if ($role === "doctor") {
            $query = $con->prepare("SELECT * FROM userrege WHERE email = ? AND password = ?");
            $query->bind_param("ss", $email, $passwd);
      
            if ($query->execute()) {
                $result = $query->get_result();
      
                if ($result->num_rows > 0) {
                   
                    header('Location: ./docterdashboard.html'); 
                    exit();
                } else {
                    $_SESSION['message'] = 'Invalid email or password.';
                }
            } 
            else {
                $_SESSION['message'] = "Error: " . $query->error;
            }
      
            $query->close();
        }
            else if ($role === "admin") {
                $query = $con->prepare("SELECT * FROM userrege WHERE email = ? AND password = ?");
                $query->bind_param("ss", $email, $passwd);
          
                if ($query->execute()) {
                    $result = $query->get_result();
          
                    if ($result->num_rows > 0) {
                       
                        header('Location: ./admin.php'); 
                        exit();
                    } else {
                        $_SESSION['message'] = 'Invalid email or password.';
                    }
                } 
                else {
                    $_SESSION['message'] = "Error: " . $query->error;
                }
          
                $query->close();
  

      $query = $con->prepare("INSERT INTO userrege (userRole, email, password) 
      VALUES (?, ?, ? )");
      $query->bind_param("sss", $role, $email, $passwd);

      if ($query->execute()) {
        header('Location: login.php');
      } else {

      }

      $query->close();

    

    $con->close();
    exit();
  }
}
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="css/login.css">
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
            
        </div>
    </header>
    <!--background-image: url("vaccine.jpg");-->
    <section class="login-section">
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" action="login.php" method="POST">
            <!-- Move the role selection inside the form -->
            <label for="userRole">Select your role:</label>
            <select id="userRole" name="userRole" required>
                <option value="" disabled selected>Select Role</option>
                <option value="patient">Patient</option>
                <option value="supplier">Supplier</option>
                <option value="nurse">Nurse</option>
                <option value="admin">Admin</option>
                <option value="doctor">Doctor</option>
            </select>

            <label for="username">Useremail</label>
            <input type="text" id="username" placeholder="Username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" placeholder="Password" name="password" required>

            <div class="remember-me">
                <input type="checkbox" id="rememberMe">
                <label for="rememberMe">Remember me</label>
            </div>

            <button type="submit">Log In</button>
            <a href="#" class="forgot-password">Forgot Password?</a>
        </form>

        <div class="create-account">
            <p>Don't have an account?</p>
            <button type="button" id="createAccountBtn">Create an account</button>
            <a href="userReg.php"></a>
        </div>
    </div>
</section>


    <footer></footer>
        <div class="footer-container">
            <div class="logo">
                <img src="images/logo.jpg" alt="LOGO" />
            </div>
            <div class="links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="about us.html">About Us</a></li>
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
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <hr>
        <div class="copyright">
            <p>Copyright © 2024 <a href="#">Website</a>. All rights reserved.</p>
        </div>
    </footer>

    <!-- <script src="js/login.js"></script> -->
</body>
</html>
