<?php
include 'db_conn.php'; 
session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
   exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>accounts page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h1>Welcome, <span><?php echo $_SESSION['admin_name'] ?></span></h1>
         <br></br>
      <p>ACCOUNT'S PAGE</p>
      <br></br>
      <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
      <br></br>
      <br>
       <a href="payment_form.php" class="btn">Payment Management</a>
       <a href="saved_form.php" class="btn">Saved Addresses</a>
       <a href="shipment_form.php" class="btn">Shipment Management</a>
    </br>
    </div>
   </div>

</div>

</body>
</html>