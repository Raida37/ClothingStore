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
    <title>Reviews</title>
    <style>
        
        .inline-image {
            display: inline-block;
            margin: 20px; 
            text-align: center; 
        }

        .inline-image img {
            width: 150px; 
            height: auto; 

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
                <p><b> Reviews </b></p> 
            </div>
          </div>
       </div>
    </main>

    <!-- Inline images with buttons -->
    <div class="inline-image">
       
        <img src="makeupbox.jpg">
        <p class="image-name">MakeUp Box</p>
       <p><strong>Review Rating:</strong> 4.9</p>
    </div>

    <div class="inline-image">
        <img src="HANGBAG.jpg">
        <p><strong>Review Rating:</strong> 4.2</p>
    </div>

    <div class="inline-image">
       
        <img src="Dress.webp">
        <p class="image-name">Modern Women's Dress</p>
        <p><strong>Review Rating:</strong> 3.5</p>
    </div>

    <div class="inline-image">
        <img src="leatherjacket.webp">
        <p class="image-name">Women's Leather Jacket</p>
       <p><strong>Review Rating:</strong> 4.8</p>
    </div>

    <div class="inline-image">
       
        <img src="beats.webp">
        <p class="image-name">Beats Headphones</p>
        <p><strong>Review Rating:</strong> 4</p>
    </div>

    <div class="inline-image">
        <img src="heels.jpg">
        <p class="image-name">High Heel Shoes</p>
        <p><strong>Review Rating:</strong> 4.1</p>
    </div>

    <div class="inline-image">
       
        <img src="powerbank.webp">
        <p class="image-name">REFLECTS PowerBank</p>
      <p><strong>Review Rating:</strong> 3.9</p>
    </div>

   
</body>
</html>
