<?php
require 'config.php';
session_start();

$userEmail = $_SESSION['userEmail'];

// Prepare the query with a placeholder
$query = $con->prepare("SELECT * from vaccine_orders where supplier_email = ?");

// Bind the parameter (the 's' means the parameter is a string)
$query->bind_param('s', $userEmail);

// Execute the query
$query->execute();

// Get the result
$result = $query->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Orders</title>
</head>
<body>

<hr>

<!-- Order Section -->
<section class="order-section">
    <h1>Congratulations!!! You are an active supplier...</h1>
    <div class="massage">
        <p><h3>You have new orders...</h3></p>
        </div>
        </section>
        <div class="orderD">
        <h2><u>Order Details...</u></h2>
        <section class ="orderTable">


</div>
        <table>
            <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Supplier ID</th>
                    <th>Supplier Email</th>
                    <th>Supplier Name</th>
                    <th>Vaccine Name</th>
                    <th>Vaccine Quantity</th>
                    <th>Delivery Date Required</th>
                    <th>Priority Level</th>
                </tr>
            </thead>
            <tbody>

            <?php
            while ($info = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?php echo $info['order_date']; ?></td>
                    <td><?php echo $info['supplier_id']; ?></td>
                    <td><?php echo $info['supplier_email']; ?></td>
                    <td><?php echo $info['supplier_name']; ?></td>
                    <td><?php echo $info['vaccine_name']; ?></td>
                    <td><?php echo $info['vaccine_quantity']; ?></td>
                    <td><?php echo $info['delivery_date_required']; ?></td>
                    <td><?php echo $info['priority_level']; ?></td>
                </tr>
            <?php
            }
            ?>

            </tbody>
        </table>

    
        </section>

<script src="js/order.js"></script>

</body>
</html>
