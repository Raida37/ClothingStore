<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>payment page</title>
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
      
  
      <button class="back-button" onclick="window.location.href='admin_page.php'" target="_blank">Back</button><h1>Payment methods</h1>
       <br></br>
      <h2>Available Payment Methods:</h2>
       <br></br>
          <a href="https://www.bkash.com/" class="btn" target="_blank">Bkash</a>
           <br></br>
         <a href="credit.php" class="btn">Credit</a>
          <br></br>
         <a href="debit.php" class="btn">Debit</a>
          <br></br>
         <a href="https://www.paypal.com/bd/home" class="btn" target="_blank">Paypal</a>
      <br></br>
      <br>
    </br>
    </div>
   </div>

</div>

</body>
</html>
