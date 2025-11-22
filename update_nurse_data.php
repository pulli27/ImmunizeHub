<?php

require'config.php';

if(isset($_POST['update']))
$p_number=$_POST['patientnum'];
$p_id=$_POST['patient-id'];
$file=$_FILES['Image']['name'];
$dst="./vaccine_certificate/".$file;
$dst_db="vaccine_certificate/".$file;
move_uploaded_file($_FILES['Image']['tmp_name'],$dst);
$update_query="UPDATE vaccinated_patients SET Vaccine_Report='$dst_db' where pnumber='$p_number'";

$result=mysqli_query($con,$update_query);

if($result)
{
    header("Location: nurseView.php");
    exit();
}
else
{
    echo"Upload failed";

}

?>