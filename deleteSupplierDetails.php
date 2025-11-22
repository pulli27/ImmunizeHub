<?php
  session_start();

  if (!isset($_SESSION['userEmail'])) {
      header('Location: login.php');
      exit();
  }

  include('config.php');

  // Retrieve the email from the POST request
  if (isset($_POST['email'])) { 
      $type = $_POST['type'];

      if ($type == "supplier") {
        $email = $_POST['email'];
  
        // Prepare the SQL statement to delete the student
        $query = $con->prepare("DELETE FROM suppliers WHERE con_email = ?");
        $query->bind_param('s', $email);
  
        if ($query->execute()) {
            // If delete is successful, destroy the session and redirect to the login page
            session_destroy();
            header('Location: supplierREG.php');
            exit();
        } else {
            echo "Error deleting record: " . $con->error;
        }}
    

      $query->close();
      $con->close();
  } else 
      echo "No email provided for deletion.";
  
?>