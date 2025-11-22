<?php
// linking the configuration file
require 'config.php';
session_start();

// Assume this is the patient identifier (e.g., retrieved from session or a form input)
$patientEmail = $_SESSION['userEmail']; // or $patientEmail = $_SESSION['userEmail']; if using sessions

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Bookings</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="css/patientbookingDisplay.css">
</head>

<body>
    <div class="title box">
        <p class="topic">Booking Details</p>
    </div>

<?php

// Query to display only the relevant patient's booking details
$sql2 = "SELECT * FROM vaccine_bookings WHERE userEmail = ?";
$stmt = $con->prepare($sql2);
$stmt->bind_param("s", $patientEmail);  // "s" means string type

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>Full Name</th>
            <th>NIC</th>
            <th>Age</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Vaccine Type</th>
            <th>Health Condition</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["full_name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["nic"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["age"]) . "</td>";  // Fixed the age column
        echo "<td>" . htmlspecialchars($row["date_of_appointment"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["time_of_appointment"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["vaccine_type"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["health_condition"]) . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No relevant booking details found.";
}

$stmt->close();
$con->close();
?>

</body>
</html>

