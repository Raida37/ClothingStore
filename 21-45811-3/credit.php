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
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Credit page</title>
   <style>
        
        .container {
            position: relative; /* Ensure the container is positioned relatively */
        }

        .back-button {
            position: absolute; /* Position the button absolutely */
            top: 10px; /* Adjust the distance from the top */
            left: 10px; /* Adjust the distance from the left */
            padding: 10px; /* Adjust padding for better appearance */
            background-color: #d70636;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #d70636;
        }

        /* Other button styles */
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
    <button class="back-button" onclick="window.location.href='payment_form.php'" target="_blank">Back</button>
      <h1>Credit</h1>
      <br></br>
      <h2>Available Credit Payment Methods:</h2>
      <br></br>
      <img src="download.png" alt="VISA logo">
      <br></br>
      <a href="https://bd.visa.com/pay-with-visa/find-a-card/credit-cards.html" class="btn" target="_blank">VISA</a>
      <br></br>
      <img src="download.jpeg" alt="Mastercard logo">
      <br></br>
      <a href="https://www.mastercard.us/en-us.html" class="btn" target="_blank">MASTERCARD</a>
      <br></br>
   </div>
</div>

</body>
</html>