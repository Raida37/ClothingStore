<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <title>Seller List</title>
    <style>
        /* CSS for styling inline images */
        .inline-image {
            display: inline-block;
            margin: 20px; /* Adjust as needed */
            text-align: center; /* Centers the image */
        }

        .inline-image img {
            width: 150px; /* Adjust width as needed */
            height: auto; /* Maintains aspect ratio */
        }

      
        .track-order-button {
            display: block; /* Ensures each button is on a new line */
            margin-top: 10px; /* Adjust spacing between image and button */
            padding: 5px 10px; /* Adjust button padding */
            background-color: #4CAF50; /* Green background */
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .track-order-button:hover {
            background-color: #45a049; /* Darker green on hover */
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

    <!-- Inline images with buttons -->
    <div class="inline-image">
       
        <img src="makeupbox.jpg">
        <p class="image-name">Make Up Box</p>
        <button class="track-order-button" onclick="window.location.href='Tracking1.php'">Track Order</button>
    </div>

    <div class="inline-image">
        <img src="HANGBAG.jpg">
        <p class="image-name">Luxury HandBag</p>
        <button class="track-order-button" onclick="window.location.href='Tracking2.php'">Track Order</button>
    </div>

    <div class="inline-image">
       
        <img src="Dress.webp">
        <p class="image-name">Modern Women's Dress</p>
        <button class="track-order-button" onclick="window.location.href='Tracking3.php'">Track Order</button>
    </div>

    <div class="inline-image">
        <img src="leatherjacket.webp">
        <p class="image-name">Women's Leather Jacket</p>
        <button class="track-order-button" onclick="window.location.href='Tracking4.php'">Track Order</button>
    </div>

    <div class="inline-image">
       
        <img src="beats.webp">
        <p class="image-name">Beats Headphones</p>
        <button class="track-order-button" onclick="window.location.href='Tracking5.php'">Track Order</button>
    </div>

    <div class="inline-image">
        <img src="heels.jpg">
        <p class="image-name">High Heel Shoes</p>
        <button class="track-order-button" onclick="window.location.href='Tracking6.php'">Track Order</button>
    </div>

    <div class="inline-image">
       
        <img src="powerbank.webp">
        <p class="image-name">REFLECTS PowerBank</p>
        <button class="track-order-button" onclick="window.location.href='Tracking7.php'">Track Order</button>
    </div>

   
</body>
</html>
