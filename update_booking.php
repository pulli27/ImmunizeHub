
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #98dcf5;
    margin: 0;
    padding: 0;
}
</style>

<?php

require'config.php';


if(isset($_POST['update'])) //methana danne submit button eke name eka
{   $book_id=$_POST['booking_Id'];
    $book_date=$_POST['date']; //input ekat gahapu name eka
    $new_date=$_POST['new_date'];
    $book_time=$_POST['time'];
    $new_time=$_POST['new_time'];
   
   

    $sql="UPDATE vaccine_bookings
    SET `date_of_appointment`='$new_date',`time_of_appointment`='$new_time'
    WHERE booking_id='$book_id' ";

    if ($con->query($sql)) {
        header("Location: bookingdetail.php");
        exit();
    } 
    
    else {
        echo "Error updating record: " . $con->error;
    }

}