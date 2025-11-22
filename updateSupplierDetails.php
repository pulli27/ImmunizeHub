<?php
  session_start();

  if (!isset($_POST['type'])) {
    header('Location: supplierProfile.php');
    exit();
  }

  include('config.php');

  
 
  $con_personName = $_POST['contactName'];
  $con_email = $_POST['email'];
  $con_phone = $_POST['phone'];
  $vaccines_supplied = $_POST['vaccines_supplied'];
  $cold_chain_transport = $_POST['cold_chain_management'];
  $avg_deliveryTime = $_POST['avg_deliveryTime'];
  $passwd = $_POST['password'];
  


  //check for use case where some values are not updated

// if ($type =='patient') {
    $query = $con->prepare("UPDATE suppliers SET con_personName = ?, con_email = ?, con_phone=?, vaccines_supplied = ?,cold_chain_transport = ?, avg_deliveryTime = ?, password= ? WHERE con_email = ?");
    $query->bind_param("ssssssss",
        $con_personName,
        $con_email,
        $con_phone,
        $vaccines_supplied,
        $cold_chain_transport,
        $avg_deliveryTime,
        $passwd,
        $con_email
    );


    if ($query->execute()) {
      header('Location:supplierProfile.php');
      
      exit();
    } else {
      echo "Error Updating the record - " .$con->error;
    }

    $query->close();
    $con->close();


?>