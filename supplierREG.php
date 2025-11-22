<?php

require 'config.php';

if (isset($_POST['submit'])) {
    $legal_company_name = $_POST['companyName'];
    $company_rege_num = $_POST['regNumber'];
    $con_personName = $_POST['contactName'];
    $con_email = $_POST['email'];
    $con_phone = $_POST['phone'];
    $vaccines_supplied = $_POST['vaccines'];
    $cold_chain_management = $_POST['coldChain'];
    $avg_deliveryTime = $_POST['deliveryLead'];
    $cold_chain_transport = $_POST['coldTransport'];
    $system_integration = $_POST['integration'];
    $accept_terms = $_POST['terms'];
    $passwd = $_POST['password'];
    $confirmPasswd = $_POST['confirmPassword'];

    // Check if passwords match
    if ($passwd !== $confirmPasswd) {
        $_SESSION['message'] = 'Passwords do not match.';
        header('Location: supplierREG.php');
        exit();
    }

    // Prepare the SQL query
    $query = $con->prepare("INSERT INTO suppliers 
        (legal_company_name	,company_rege_num, con_personName,con_email,con_phone,vaccines_supplied,cold_chain_management,avg_deliveryTime,cold_chain_transport,system_integration,accept_terms,password	) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $query->bind_param(
        "ssssssssssss",
        $legal_company_name,
        $company_rege_num,
        $con_personName,
        $con_email,
        $con_phone,
        $vaccines_supplied,
        $cold_chain_management,
        $avg_deliveryTime,
        $cold_chain_transport,
        $system_integration,
        $accept_terms,
        $passwd
    );

    // Execute the query and check for success
    if ($query->execute()) {
        header('Location: login.php');
        exit();
    } else {
        // Handle query execution error (if any)
        echo "Error: " . $query->error;
    }

    // Close the query and connection
    $query->close();
    $con->close();
}
?>








<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/supplierREGE.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Immunize Hub</title>
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
                <li><a href="faq.html">FAQ's</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
        <div class="user-login">
            <i class="fas fa-user"></i>
            <a href="login.php" class="login-btn">Login</a>
        </div>
    
</header>
<hr>


<div class="formREC">
    <div class="headTopic">
        <h1>Suppliers Registration</h1>
    </div>
        
        <form method="post" action="./supplierREG.php"  id="registrationForm">
            <label for="companyName">Legal company name</label>
            <input type="text" id="companyName" name="companyName" required>
            
            <label for="regNumber">Company registration number</label>
            <input type="text" id="regNumber" name="regNumber" required>

            <label for="contactName">Contact Name </label>
            <input type="text" id="contactName" name="contactName" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>

            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

            <label for="vaccines">What vaccines do you supply</label>
            <input type='text' id="vaccines" name="vaccines" >

            <label for="coldChain">How do you manage cold chain requirements? (e.g. temperature control, storage)</label>
            <input type="text" id="coldChain" name="coldChain" required>

            <label for="deliveryLead">Average delivery lead time</label>
            <input type="text" id="deliveryLead" name="deliveryLead">

            <label for="coldTransport">How do you maintain cold chain during transport?</label>
            <input type='text' id="coldTransport" name="coldTransport" >

            <label>Can your system integrate with our portal?</label>
            <label><input type="radio" name="integration" value="yes" required> Yes</label>
            <label><input type="radio" name="integration" value="no" required> No</label>

            <label>Do you accept the portal's terms and conditions?</label>
            <label><input type="radio" name="terms" value="yes" required> Yes</label>
            <label><input type="radio" name="terms" value="no" required> No</label>

            <label> <input type="password" id="password" placeholder="Password" name="password"required></label>
            <label><input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword"required></label>

            <input type="submit" value="Submit" name="submit">




        </form>

   
</div>




<footer>
    <div class="footer-container">
        <div class="logo">
            <img src="images/logo.jpg" alt="LOGO" />
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


</body>
</html>