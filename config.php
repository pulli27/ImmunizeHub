<?php
$con=new mysqli("localhost","root","","immunizehub",3307);

   if($con->connect_error)
   {
       die("Connection failed".$con->connect_error);

   }
//    else {
//       echo "Sucessful";
//   }
  ?>