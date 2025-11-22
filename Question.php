<?php
// linking the configuration file
require('config.php');
?>




<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="healthFAQ.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Add Patient Details</title>
</head>

<hr>
<br><br>
<body>
    <div class="container">
        
        <div class="form-container">
            <h2>Questions</h2>
            <form  action="Question.php" method="POST">
                <label for="question">Questions:</label>
                <input type="text" id="question" name="question" placeholder="Type question">

                <button type="submit" name="Submit">Send</button>
            </form>
        </div>
    </div>
</body>
<br><br>


</html>

<?php
// if someone click the submit button then 
if (isset($_POST['Submit'])) {
    // get the data from identifying name

    $quizH = $_POST['question'];
    // $replyH = $_POST['reply'];


    //  echo $prescription_id;

    // insert data   -- these are should exactly db column names--
    $query = "INSERT INTO health_inquiries(Quection,reply)
                  VALUES('$quizH', '')";

    // put data to databes
    $result=mysqli_query($con,$query);

    // checking that works or not
    if ($result) {
        echo "Upload success";
    } else {
        echo "Not success";
    }

    // we use this to redirect the page when this refresh 
    // header("Location: bill2.php?ID=" . $prescription_id);

    if ($result) {
        echo "<script>alert('Add successfully!');</script>";
    } else {
        echo "<script>alert('Error occured while adding');</script>";
    }

    echo "<script>window.location.href='patientProfile.php';</script>";
}

?>