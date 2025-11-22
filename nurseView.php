<?php

require'config.php';
if (isset($_GET['delete'])) {
    $pnumber = $_GET['delete'];  

    
    $query = "DELETE FROM vaccinated_patients WHERE pnumber = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $pnumber);  

    $stmt->execute();
    $stmt->close();
    header("Location: nurseView.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nurseView.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Nurse-paitent details</title>
</head>

<hr>
<br><br>
<body>
<h1>Patient Details</h1>
<?php
    
    $query="SELECT * from vaccinated_patients";
    $result=mysqli_query($con,$query);
    
?>

<table id="patientTable">
    <thead>
        <tr>
            <th>PatientID</th>
            <th>Patient Name</th>
            <th>Vaccine report</th>
            <th>Delete</th>
            <th>Update</th>
            
        </tr>

        <?php

while($info=$result->fetch_assoc())
{
     ?>      


    <tr>
   <?php     
       echo "<td>{$info['PatientID']}</td>";
       echo "<td>{$info['PatientName']}</td>";
       echo "<td><img src='{$info['Vaccine_Report']}' alt='Vaccine Report' width='100' height='100'></td>";
    //    echo "<td><a href='updatebooking.php?booking_id={$info["booking_id"]}'>Edit</a></td>";
       ?>
   

     <td><a href="?delete=<?php echo $info['pnumber']; ?>" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a></td>

     <?php
     echo "<td><a href='update_nurse.php?ID={$info["pnumber"]}'>Edit</a></td>";

     ?>


</tr>
    <?php
}

?>
    </thead>
    <tbody>
       
      
        
       
    </tbody>
</table>

<br><br><br>

<script src="js/nurse.js"></script>
</body>

</html>