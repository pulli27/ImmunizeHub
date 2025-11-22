<?php
// linking the configuration file
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Doctor Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/healthdash.css">


</head>

<body>

<?php
// Check if 'edit' link is clicked to load the form with existing data
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    // Fetch the data for the selected ID
    $sql = "SELECT * FROM health_inquiries WHERE Qid = $edit_id";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $questionID = $row['Qid'];
        $inquiryH = $row['Quection'];
        $replyH = $row['reply'];
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  
   

    <h3>
        <?php
            if (isset($questionID))
            {
                echo 'Reply to the question';
            } else
            {
                echo 'Input Some more things to know people';
            }
        ?>

</h3>


    <label for="question">Question that ask Patient:</label>
    <input type="text"  name="question" value="<?php echo isset($inquiryH) ? $inquiryH : ''; ?>"><br />

    <label for="reply">Reply for the question:</label>
    <input type="text"  name="reply" value="<?php echo isset($replyH) ? $replyH : ''; ?>"><br />

    <input type="hidden" name="edit_id" value="<?php echo isset($questionID) ? $questionID : ''; ?>">

    <input type="submit" value="<?php echo isset($questionID) ? 'Update' : 'Submit'; ?>" name="<?php echo isset($questionID) ? 'btnUpdate' : 'btnSubmit'; ?>">

    <input type="reset" value="Reset">



</form>

<?php
// Check if the form is submitted for a new record
if (isset($_POST["btnSubmit"])) {
    $C_inquiryH = $_POST["question"];
    $C_reply = $_POST["reply"];

    // Insert the values into the database
    $sql = "INSERT INTO health_inquiries(Quection, reply) VALUES( '$C_inquiryH', '$C_reply')";

    if ($con->query($sql)) {
        echo "";
    } else {
        echo "Error: ". $con->error;
    }
}

// Check if the form is submitted for updating a record
if (isset($_POST['btnUpdate'])) {
    $update_questionID = $_POST['edit_id'];
    $update_question = $_POST['question'];  
    $reply = $_POST['reply']; // The new name

    // Update the record in the database
    $sql = "UPDATE health_inquiries SET Quection='$update_question', reply = '$reply' WHERE Qid = $update_questionID";

    if ($con->query($sql)) {
        echo "";
    } else {
        echo "Error updating record: " . $con->error;
    }
}



if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete']; // The ID of the record to be deleted

    // Delete the record from the database
    $del_query = "DELETE FROM health_inquiries WHERE  Qid = $delete_id";

    $result = mysqli_query($con, $del_query);

    if ($result) {
        echo "";
    } else {
        echo "Error deleting record: " . $con->error;
    }
}


// Display all records in a table
$sql2 = "SELECT * FROM health_inquiries";
$result = $con->query($sql2);

if ($result->num_rows > 0) {
    echo "<table>";
    echo " <tr>
            <th>Question</th>
            <th>Reply</th>
            <th>Answer for question</th>
            <th>DELETE</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["Quection"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["reply"]) . "</td>";
        echo "<td><a href='?edit=" . $row["Qid"] . "' class='edit-icon'><i class='fas fa-edit'></i></a></td>";
        echo "<td><a href='?delete=" . $row["Qid"] . "' class='delete-icon'><i class='fas fa-trash-alt'></i></a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

$con->close();
?>

</body>
</html>



