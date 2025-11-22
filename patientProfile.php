<?php
  session_start();

  // Check if the user is logged in
  if (!isset($_SESSION['userEmail'] )) {
      header('Location: login.php');
      exit();
  }

  // Retrieve the session variables
  $userEmail = $_SESSION['userEmail'];
  

  require('config.php');

  $query = $con->prepare("SELECT * FROM patients WHERE email = ? ");
  $query->bind_param('s', $userEmail);

  if ($query->execute()) {
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $patientData= $result->fetch_assoc();
    } else {
        echo "Invalid login credentials!";
    }
  }

  $query->close();
  $con->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="../../../styles/commonNavbarAndFooterStyles.css"
    />
    <link rel="stylesheet" href="patientProfile.css" />
    <link rel="stylesheet" href="css/patientProfile.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script defer src="js/patientProfile.js"></script>
    <title>ImmunizeHub</title>
  </head>

  <body>
    <div id="editModal" class="modal">
      <div class="modal-content">
        <div class="modal-heading">
          <h2>Edit Profile Details</h2>
          <span class="close-btn" onclick="onCloseBtnClick()">&times;</span>
        </div>
        <form action="updatepatientDetails.php" method="POST">
          <label for="name">First Name:</label>
          <input type="text" name="FirstName" value=<?php echo  $patientData['FirstName'] ?> />
          <label for="name">Last Name:</label>
          <input type="text" name="LastName" value=<?php echo  $patientData['LastName'] ?> />
          <label for="phone">Contact:</label>
          <input type="text" name="phone" value=<?php echo  $patientData['contact'] ?> />
         <label for="email">Email:</label>
          <input type="email" name="email" value=<?php echo  $patientData['email'] ?> />
          
    
          <label for="password">Password:</label>
          <input type="password" name="password" value=<?php echo  $patientData['password'] ?> />
          
          <input hidden type="text" name="type" value="patient"/>
          <input hidden type="text" name="previus-email" value=<?php echo  $patientData['email'] ?> />
          <button type="submit">Save Changes</button>patientData
        </form>
      </div>
    </div>

    <div class="wrapper">
      <div class="container">
        <aside class="sidebar">
          <h1>ImmunizeHub</h1>
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="vaccinationAppointment.php">Book Vaccine</a></li>
            
            
          </ul>
          <button class="profile-btn">
            <a href="Question.php">Ask Quections</a>
          </button>
          <br><br><br>
          <button class="profile-btn">
            <a href="patientQesDisplay.php">Q&A about Health</a>
          </button>
          <br><br><br>
          <button class="profile-btn">
            <a href="patientbookingDisplay.php">View Vaccine Bookings</a>
          </button>
          <br><br><br>
          <button class="profile-btn">
            <a href="login.php">Logout</a>
          </button>
        </aside>
      </div>
    </div>

    <div class="patient-profile-details">
      <div class="patient-profile-img">
        <i class="bx bx-user"></i>
        <p class="patient-name"><?php echo  $patientData['FirstName'] ?></p>
        <p class="patient-name"><?php echo  $patientData['LastName'] ?></p>
      
      </div>
      <div class="patient-profile-description">
        <div class="patient-profile-contact">
          <div class="patient-contact-info" onclick="onEditBtnClick()">
            <p>Contact Information</p>
            <i class="bx bx-edit"></i>
          </div>
          <div class="patient-personal-details">
            <div class="patient-email patient-personal-detail-items">
              <p>Email:</p>
              <?php echo  $patientData['email'] ?>
            </div>
            <div class="patient-phoneno patient-personal-detail-items">
              <p>Phone No:</p>
              <?php echo  $patientData['contact'] ?>
            </div>
           
           
            
            <div class="delete-account">
            <form action="deletepatientProfile.php" method="POST">
              <input type="hidden" name="email" value="<?php echo $patientData['email']; ?>" />
              <input type="hidden" name="type" value="patient" />
              <button type="submit" class="delete-account-btn">Delete Account</button>
            </form>
            </div>
          </div>
        </div>
     
      </div>
    </div>
  </body>
</html>


