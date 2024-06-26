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
    <link rel="stylesheet" href="mystyle.css">
    <title>Seller List</title>
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
            padding: 5px 10px; 
            background-color: #d70636;
            color: black;
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
            background-color: #d70636;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #d70636;
        }
    </style>
</head>
<body>
    <div class="nav">
         <div class="logo">
            <p><a href="home.php">Happy Shopping!</a> </p>
        </div>

        <div class="right-links">
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
    <main>
       <div class="main-box top">
          <div class="bottom">
            <div class="box">
                <p><b> Seller List </b></p> 
            </div>
          </div>
       </div>
    </main>

    
    <div class="inline-image">
       
        <img src="makeupbox.jpg">
        <p class="image-name">MakeUp Box</p>
        <button class="button" onclick="window.location.href='Tracking1.php'">Track Order</button>
    </div>

    <div class="inline-image">
        <img src="HANGBAG.jpg">
        <p class="image-name">Luxury HandBag</p>
        <button class="button" onclick="window.location.href='Tracking2.php'">Track Order</button>
    </div>

    <div class="inline-image">
       
        <img src="Dress.webp">
        <p class="image-name">Modern Women's Dress</p>
        <button class="button" onclick="window.location.href='Tracking3.php'">Track Order</button>
    </div>

    <div class="inline-image">
        <img src="leatherjacket.webp">
        <p class="image-name">Women's Leather Jacket</p>
        <button class="button" onclick="window.location.href='Tracking4.php'">Track Order</button>
    </div>

    <div class="inline-image">
       
        <img src="beats.webp">
        <p class="image-name">Beats Headphones</p>
        <button class="button" onclick="window.location.href='Tracking5.php'">Track Order</button>
    </div>

    <div class="inline-image">
        <img src="heels.jpg">
        <p class="image-name">High Heel Shoes</p>
        <button class="button" onclick="window.location.href='Tracking6.php'">Track Order</button>
    </div>

    <div class="inline-image">
       
        <img src="powerbank.webp">
        <p class="image-name">REFLECTS PowerBank</p>
        <button class="button" onclick="window.location.href='Tracking7.php'">Track Order</button>
    </div>

   
</body>
</html>
