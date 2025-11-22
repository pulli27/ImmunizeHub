<?php
  session_start();

  if (!isset($_POST['type'])) {
    header('Location:  patientProfile.php');
    exit();
  }

  include('config.php');



    $f_name=$_POST['FirstName'];
    $l_name=$_POST['LastName'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $passwd=$_POST['password'];
    

  //check for use case where some values are not updated

// if ($type =='patient') {
    $query = $con->prepare("UPDATE patients SET FirstName = ?, LastName = ?, contact = ?, email = ?, password= ? WHERE email = ?");
    $query->bind_param("ssssss", $f_name, $l_name, $phone, $email, $passwd,$email);


    if ($query->execute()) {
      header('Location:patientProfile.php');
     
      exit();
    } else {
      echo "Error Updating the record - " .$con->error;
    }

    $query->close();
    $con->close();

//   } else if ($type == 'examiner') {
//     $query = $conn->prepare("UPDATE examiners SET name = ?, subject = ?, email = ?, password = ? WHERE email = ?");
//     $query->bind_param("sssss", $name, $subject, $email, $password, $previus_email);


//     if ($query->execute()) {
//       header('Location: ../components/ExaminerPages/ExaminerProfile/examinerProfile.php');
//       session_destroy();
//       exit();
//     } else {
//       echo "Error Updating the record - " .$conn->error;
//     }
//   }
?>