<?php

require 'config.php';

if(isset($_POST['submit']))
{
    $pID=$_POST['patientID'];
    $msg=$_POST['message'];
    $file=$_FILES['healthreport']['name'];

    $dst="./healthreport/".$file;
    $dst_db="healthreport/".$file;

    move_uploaded_file($_FILES['healthreport']['tmp_name'],$dst);

    
    $query = "INSERT INTO healthReport(PatientID,message,health_report) VALUES ('$pID','$msg','$dst_db')";

    $result=mysqli_query($con,$query);

}   
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/upload_healthReport.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>upload health report</title>
</head>

<hr>
<br><br><br>

<main>
    <section class="form-section">
        <div class="form-container">
            <h2>Upload Health Report</h2> <br>
            <form id="healthReportForm" action="upload_healthReport.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
              
           
                <label for="patient-id">Patient ID:</label>
                <select id="patientID" name="patientID" required>
     <?php
       
        $query = "SELECT PatientID, FirstName, LastName, contact, email, password FROM patients";
        $result = mysqli_query($con, $query);

       
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['PatientID']."'>".$row['PatientID']."</option>";
        }
    ?>  -
    </select>
                </div>
                <div class="form-group">
                    <label for="message">Add message</label>
                    <input type="text" id="message" class="message" name="message" placeholder="Type your message">
                </div>
                <div class="form-group">
                    <label for="healthReport">Add health report</label>
                    <input type="file" id="healthReport"name ="healthreport">
                </div>
                <div class="form-actions">
                <input type="submit" name="submit" value="Submit">
                  <br><br>
                 
                </div>
            </form>
        </div>
    </section>
</main>


</html>