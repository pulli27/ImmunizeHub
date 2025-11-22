
<?php

require 'config.php';

if(isset($_POST['submit']))
{
    $pID=$_POST['patientID'];
    $pname=$_POST['patientName'];
    $file=$_FILES['vaccine_certificate']['name'];

    $dst="./vaccine_certificate/".$file;
    $dst_db="vaccine_certificate/".$file;

    move_uploaded_file($_FILES['vaccine_certificate']['tmp_name'],$dst);

    
    $query = "INSERT INTO vaccinated_patients(PatientID,PatientName,Vaccine_Report) VALUES ('$pID','$pname','$dst_db')";

    $result=mysqli_query($con,$query);

}   


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/vac_reUpload.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Add Patient vaccine reports</title>
</head>

<hr>
<br><br>
<body>
    <div class="container">
        <div class="image-container">
            <img src="images/add.jpg">
        </div>
        <div class="form-container">
            <h2>Add Patient vaccine reports</h2>
            <form id="vacReportForm" action="vac_reUpload.php" method="POST" enctype="multipart/form-data" >
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
    <br><br>
                <label for="patient-name">Patient Name:</label>
                <select id="patientName" name="patientName" required>
     <?php
       
        $query = "SELECT PatientID, FirstName, LastName, contact, email, password FROM patients";
        $result = mysqli_query($con, $query);

       
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='".$row['FirstName']."'>".$row['FirstName']."</option>";
        }
    ?>  
    </select>
  <br><br>
                <label for="vaccine-report">Vaccine report:</label>
                <input type="file" id="vaccine_certificate" name="vaccine_certificate" placeholder="Enter vaccine report">


               <input type="submit" name="submit" value="Submit">
              
               <a href="nurseView.php" class="button">View Patient Details</a>
            </form>
        </div>
    </div>
</body>
<br><br>


</html>
