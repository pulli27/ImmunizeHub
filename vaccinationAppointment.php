<?php

session_start();
  
  require 'config.php';

  if (!isset($_SESSION['userEmail'])) {
    header("Location: login.php");
    exit();
  }

  

   if(isset($_POST['submit']))
   {
     $pname=$_POST['name'];
     $pnic=$_POST['nic'];
     $page=$_POST['age'];
     $pdate=$_POST['date'];
     $ptime=$_POST['time'];
     $pVaccineType=$_POST['vaccineType'];
     $health=$_POST['health_condition'];
   

    $userEmail = $_SESSION['userEmail'];


   
     $query = "INSERT INTO vaccine_bookings(full_name,nic,age,date_of_appointment,time_of_appointment,vaccine_type,health_condition, userEmail) VALUES ('$pname','$pnic','$page','$pdate','$ptime','$pVaccineType','$health', '$userEmail')";

    $result=mysqli_query($con,$query);

    
   }



?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Vaccination Appointment Page</title>
    <link rel="stylesheet" href="css/vaccinationAppointment.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
   
   
    <section>
        <div class="appointment-form">
            <h2>Book a Vaccine</h2>
            <form id="vaccineForm" action="./vaccinationAppointment.php" method="POST" enctype="multipart/form-data">
                <label for="fullName">Enter your Full Name</label>
                <input type="text" id="fullName" placeholder="Your Name" name="name"required>

                <label for="nic">Enter your NIC</label>
                <input type="text" id="nic" placeholder="Your NIC" name="nic" required>

                <label for="age">Enter your Age</label>
                <input type="number" id="age" placeholder="Your age" name="age"required>

                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>

                <label for="time">Time</label>
                <input type="time" id="time" name="time" required>

                <label for="vaccineType">Vaccine Type</label>
                <select id="vaccineType" name="vaccineType" required>
     <?php
       
        $query = "SELECT vaccine_id, vaccine_type FROM vaccines";
        $result = mysqli_query($con, $query);

       
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['vaccine_type']."'>".$row['vaccine_type']."</option>";
        }
    ?>  -
                </select>

                <label for="healthCondition">Health Condition</label>
                <input type="text" id="fileUpload_T" name="health_condition">

             
               

                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </section>

    
  
</body>
</html>

