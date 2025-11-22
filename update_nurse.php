<?php

require'config.php';

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/update_nurse.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Update Patient Details</title>
</head>

<hr>
<br><br>
<body>

<?php
    $up_id = $_GET['ID'];

    $sql = "SELECT * from vaccinated_patients where pnumber = '$up_id'";
    $result = mysqli_query($con,$sql);
    $info = $result->fetch_assoc();


?>


    <div class="container">
        <div class="image-container">
            <img src="images/update.jpg">
        </div>
        <div class="form-container">
            <h2>Update Patient Details</h2>
            <form action='update_nurse_data.php' method='POST' enctype='multipart/form-data' >

    
    <input type="text" id="patientnum" name="patientnum" placeholder="Enter patient id" 
    value="<?php echo $info['pnumber']; ?>" hidden>


    <label for="patient-ID">Patient ID:</label>
    <input type="text" id="patient-id" name="patient-id" placeholder="Enter patient id" 
    value="<?php echo $info['PatientID']; ?>">

    <lable for="oldVaccinereport">Old vaccine Report</label>
    <br>
    <img height='100' width='100' src="<?php echo"{$info['Vaccine_Report']}";?>">
<br><br>
    <lable for="newVaccinereport">New vaccine Report</label>
    <input type="file" name="Image">

    <input type="submit" name='update' value="UPDATE">


 

</form>
<?php
?>

        </div>
    
</body>

<br><br>

</html>
