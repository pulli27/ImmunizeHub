<?php

require 'config.php';
$book_id=$_GET['booking_id'];

$query="DELETE FROM vaccine_bookings where booking_id='$book_id'";


$result=mysqli_query($con,$query);



?>

