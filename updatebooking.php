<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateBookingDetails</title>
    <link rel="stylesheet" href="css/updatebooking.css">
</head>
<body>
<h1><center>Update Booking Details</center></h1>
    <?php

require 'config.php';


$book_Id=$_GET['booking_id']; 

//echo"$book_Id"; 

$sql="SELECT * FROM vaccine_bookings where booking_id='$book_Id'";

$result = mysqli_query($con,$sql);

$info = $result->fetch_assoc();

// echo"{$info['Order_Id']}";
// echo"{$info['Supplier Name']}";
// echo"{$info['Vaccine Name']}";
// echo"{$info['Quantity']}";

?>
    <div class="formcontainer">
    <form action="update_booking.php" method="POST">

    <div>
        
        <input type="text" name="booking_Id" class="form" value="<?php echo"{$info['booking_id']}"; ?>" hidden>
    </div>

    <div>
        <label for=""> Old Date of Appointment</label>
        <input type="date" name="date"  class="form" value="<?php echo"{$info['date_of_appointment']}"; ?>">
    </div>

    <div>
        <label for="">New Date of Appointment</label>
        <input type="date" name="new_date"  class="form">
    </div>

    <div>
        <label for=""> Old Time of Appointment</label>
        <input type="time" name="time"  class="form" value="<?php echo"{$info['time_of_appointment']}"; ?>">
    </div>

    <div>
        <label for="">New Time of Appointment</label>
        <input type="time" name="new_time"  class="form">
    </div>

    <div>
        <input type="submit" name="update"  class="submit" value="Update Details">
    </div>



</form>
</div>


<?php





?>
    
</body>
</html>