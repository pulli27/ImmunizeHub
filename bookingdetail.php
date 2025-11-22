<?php

require 'config.php';

if (isset($_GET['delete'])) {
    $booking_id = $_GET['delete'];  

    
    $query = "DELETE FROM vaccine_bookings WHERE booking_id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $booking_id);  

    $stmt->execute();
    $stmt->close();
    header("Location: bookingdetail.php");
    exit();
}

?>



<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/bookingdetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/script.js"></script>
    <title>Booking details</title>
</head>
<body>

<br><br><br>

<section class="booking-details">
    <h1>Booking Details</h1>

    <?php
    
    $query="SELECT * from vaccine_bookings";
    $result=mysqli_query($con,$query);
    
    ?>
    <table>
       
            <tr>
                <th>Booking id</th>
                <th>Full Name</th>
                <th>NIC</th>
                <th>Age</th>
                <th>Date</th>
                <th>Time</th>
                <th>Vaccine Type</th>
                <th>Health Condition</th>
                <th>Edit Booking</th>
                <th>Cancel Booking </th>
            </tr>
      <?php

        while($info=$result->fetch_assoc())
        {
             ?>      
        
       
            <tr>
           <?php     
               echo "<td>{$info['booking_id']}</td>";
               echo "<td>{$info['full_name']}</td>";
               echo "<td>{$info['nic']}</td>";
               echo "<td>{$info['age']}</td>";
               echo "<td>{$info['date_of_appointment']}</td>";
               echo "<td>{$info['time_of_appointment']}</td>";
               echo "<td>{$info['vaccine_type']}</td>";
               echo "<td>{$info['health_condition']}</td>";
               echo "<td><a href='updatebooking.php?booking_id={$info["booking_id"]}'>Edit</a></td>";
               ?>
               <td><a href="?delete=<?php echo $info['booking_id']; ?>" onclick="return confirm('Are you sure you want to delete this booking?');">Cancel</a></td>
           
            </tr>
            <?php
        }

        ?>
        
    </table>
</section>

    

</body>

</html>
