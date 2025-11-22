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

  $query = $con->prepare("SELECT * FROM suppliers WHERE con_email = ? ");
  $query->bind_param('s', $userEmail);

  if ($query->execute()) {
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $supplierData= $result->fetch_assoc();
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
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> -->
    <!-- <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    /> -->
    <link
      rel="stylesheet"
      href="css/supplierProfile.css"
    />
    <link rel="stylesheet" href="css/supplierProfile.css" />
    
    <link
      href="https://cdn.jsdelivr.net/npm/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    /> 
    <script defer src="js/supplierProfile.js"></script>
    <title>ImmunizeHub</title>
  </head>

  <body>
    <div id="editModal" class="modal">
    <div class="modal-content">
  <div class="modal-heading">
    <h2>Edit Profile Details</h2>
    <span class="close-btn" onclick="onCloseBtnClick()">&times;</span>
  </div>
  <form action="updateSupplierDetails.php" method="POST">
    <!-- form fields -->
    

          <label for="contactName">Contact Name: </label>
          <input type="text" name="contactName" value=<?php echo  $supplierData['con_personName'] ?> />

          <label for="email">Email:</label>
          <input type="text" name="email" value=<?php echo  $supplierData['con_email'] ?> />

          <label for="phone">Phone:</label>
          <input type="text" name="phone" value=<?php echo  $supplierData['con_phone'] ?> />

          <label for="vaccines">What vaccines do you supply:</label>
          <input type="text" name="vaccines"<?php echo $supplierData['vaccines_supplied']; ?>/>

          <label for="coldTransport">How do you maintain cold chain during transport?</label>
          <input type="text" id="coldTransport" name="coldTransport" <?php echo $supplierData['cold_chain_transport']; ?> />


          <label for="deliveryLead">Average delivery lead time:</label>
          <input type="text" name="deliveryLead" value=<?php echo  $supplierData['avg_deliveryTime'] ?> />

          
          
          <label for="password">Password:</label>
          <input type="password" name="password" value=<?php echo  $supplierData['password'] ?> />
          
          <input hidden type="text" name="type" value="supplier"/>
          

          <input hidden type="text" name="previous-email" value="<?php echo $supplierData['con_email']; ?>" />


          <button type="submit">Save Changes</button>
          <a href="updateSupplierDetails.php"></a>
        </form>
      </div>
    </div>

    <div class="wrapper">
      <div class="container">
        <aside class="sidebar">
          <h1>ImmunizeHub</h1>
          <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="order.php">View Order</a></li>
          </ul>
          <button class="profile-btn">
            <a href="login.php">Logout</a>
          </button>
        </aside>
      </div>
    </div>

    <div class="supplier-profile-details">
      <div class="supplier-profile-img">
        <i class="bx bx-user"></i>
   
        <p class="supplier-name"><?php echo  $supplierData['legal_company_name'] ?></p>
        <p class="supplier-name"><?php echo  $supplierData['company_rege_num'] ?></p>
      
      </div>
      <div class="supplier-profile-description">
        <div class="supplier-profile-contact">
          <div class="supplier-contact-info" onclick="onEditBtnClick()">
            <p>Supplier Information</p>
            <i class="bx bx-edit"></i>
          </div>
          <div class="supplier-personal-details">
            <div class="supplier-email supplier-personal-detail-items">
              <p>Email:</p>
              <?php echo  $supplierData['con_email'] ?>
            </div>
            <div class="supplier-phoneno supplier-personal-detail-items">
              <p>Phone No:</p>
              <?php echo  $supplierData['con_phone'] ?>
            </div>
           
           
            
            <div class="delete-account">
            <form action="deleteSupplierDetails.php" method="POST">
              <input type="hidden" name="email" value="<?php echo $supplierData['con_email']; ?>" />
              <input type="hidden" name="type" value="supplier" />
              <button type="submit" class="delete-account-btn">Delete Account</button>
            </form>
            </div>
          </div>
        </div>
     
      </div>
    </div>
  </body>
</html>
