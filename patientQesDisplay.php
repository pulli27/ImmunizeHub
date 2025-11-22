<?php
// linking the configuration file
require 'config.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Questions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/patientQesDisplay.css">



</head>

<body>
    <div class="title box">
    <p class="topic">Dive Into Discussions</p>
    </div>

<?php

// Display all records in a table
$sql2 = "SELECT * FROM health_inquiries";
$result = $con->query($sql2);


if ($result->num_rows > 0) {
    echo "<table>";
    echo " <tr>
            <th>Question</th>
            <th>Reply</th>
            
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["Quection"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["reply"]) . "</td>";
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



