
<?php


  
  require 'config.php';



  

   if(isset($_POST['submit']))
   {
     
     $order_date=$_POST['orderDate'];
     $supplier_ID=$_POST['supplierID'];
     $supplier_email=$_POST['supplierEmail'];
     $supplier_name=$_POST['supplierName'];
     $vaccine_name=$_POST['vaccineName'];
     $vaccine_quntity=$_POST['vaccineQuantity'];
     $delivary=$_POST['deliveryDateRequired'];
     $priority=$_POST['priorityLevel'];

   
    
   
     $query = "INSERT INTO vaccine_orders (order_date,supplier_id,supplier_email,supplier_name,vaccine_name,vaccine_quantity,delivery_date_required,priority_level) 
     VALUES ('$order_date','$supplier_ID','$supplier_email',' $supplier_name','$vaccine_name','$vaccine_quntity','$delivary','$priority')";

    $result=mysqli_query($con,$query);
    
   }
?>






<!DOCTYPE html>
<html>
<head>
  
    <link rel="stylesheet" href="css/order_form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="js/order_form.js"></script>
    <title>Order_form</title>
</head>
<body>


<br>
<br>
<div class="container">
     <h1>Vaccine Order Form</h1>
        <form id="vaccineOrderForm" action="./order_form.php" method="POST" >

        <label for="orderDate">Order Date:</label>
        <input type="date" id="orderDate" name="orderDate" required>

        <label for="supplierID">Supplier ID:</label>

        <select id="supplierID" name="supplierID" required>
        <?php
    
    $query = "SELECT id,legal_company_name FROM suppliers";
    $result = mysqli_query($con, $query);

  
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='".$row['id']."'>".$row['id']."</option>";
    }
?>  </select> 



        <label for="supplieremail">Supplier Email:</label>

        <select id="supplierEmail" name="supplierEmail" required>

     <?php
    
         $query = "SELECT con_email,legal_company_name FROM suppliers";
         $result = mysqli_query($con, $query);

       
         while ($row = mysqli_fetch_assoc($result)) {
             echo "<option value='".$row['con_email']."'>".$row['con_email']."</option>";
         }
    ?>  </select> 

        <label for="supplierName">Supplier Name:</label>
        <select id="supplierName" name="supplierName" required>
     <?php
       
         $query = "SELECT id,legal_company_name FROM suppliers";
         $result = mysqli_query($con, $query);

       
         while ($row = mysqli_fetch_assoc($result)) {
             echo "<option value='".$row['legal_company_name']."'>".$row['legal_company_name']."</option>";
         }
    ?>  </select> 
        
        <label for="vaccineName">Vaccine Name:</label>
        <input type="text" id="vaccineName" name="vaccineName" required>

        <label for="vaccineQuantity">Vaccine Quantity:</label>
        <input type="number" id="vaccineQuantity" name="vaccineQuantity" required>

        <label for="deliveryDateRequired">Delivery Date Required:</label>
        <input type="date" id="deliveryDateRequired" name="deliveryDateRequired" required >

        <label for="priorityLevel">Priority Level:</label>
        <select id="priorityLevel" name="priorityLevel">
            <option value="High">High</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
        </select>
        
        <label for="">
            <input type ="checkbox" id="checkbox" onclick="enableButton()">By submitting this order, I agree to the Immunize Hub Terms and Vaccine Ordering Policy. 

        </label>
        
        <input type="submit" name="submit" value="Submit">
      
    </form>

    
</div>

<br>
</body>
</html>