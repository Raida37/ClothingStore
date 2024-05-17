<?php
session_start();

include("php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit(); 
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Tracking</title>
    <style>
   
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: lightpink;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            margin-top: 0;
        }

        .transaction-details, .order-process {
            margin-bottom: 20px;
        }

        .order-step {
            margin-bottom: 10px;
        }

        .order-step p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tracking Page</h1>

        <div class="transaction-details">
            <h2>Product Details</h2>
            <p><strong>Price:</strong> $250.00</p>
            <p><strong>Date:</strong> 2024-05-11</p>
        </div>


        <div class="order-process">
            <h2>Order Process</h2>
            <div class="order-step">
                <p><strong>Ordered:</strong> Yes</p>
                <p><strong>Shipped:</strong> No</p>
                <p><strong>Delivered:</strong> No</p>
          
            </div>
        </div>
    </div>
</body>
</html>
