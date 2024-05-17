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
   
   <title>Shipping page</title>
   <style>
        
   .inline-image {
            display: inline-block;
            margin: 20px; 
            text-align: center; 
        }

        .inline-image img {
            width: 150px; 
            height: auto; 
        }

      
        .button {
            display: block; 
            margin-top: 10px; 
            padding: 50px 10px; 
            background-color: #d70636;
            color: black;
            width: 150px;
            height: 50px;
            font-size: 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #d70636;
        }

        .button {
            display: block; 
            margin-top: 10px; 
            padding: 5px 10px; 
            background-color: seagreen;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: whitesmoke;
        }
</style>

   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
  
      <h1>Shipment Addresses</h1>
       <br></br>
      <h2>SHIPPED!!</h2>
 
<div class="inline-image">
              <button class="button" onclick="window.location.href='shipment_form.php'">Back</button>
     </div>
   
</body>
</html>