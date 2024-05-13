<?php

require('../Controller/checkLoggedIn.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Asset/style/style.css">
</head>
<body>
    <center>
        <h1>Dashboard</h1>

        <h2>Products</h2>

        <h3>Total Products</h3>
        <p id="totalProducts"></p>
        
        <h3>Total Price of Products</h3>
        <p id="totalProductPrice"></p>
        
        <h2>Transactions</h2>
        
        <h3>Total Transactions</h3>
        <p id="totalTransactions"></p>
        
        <h2>Sellers</h2>
        
        <h3>Total Sellers</h3>
        <p id="totalSellers"></p>
        
        <h3>Top 5 Sellers</h3>
        <table class="text" id="topSellers"></table>

        



    </center>
        
    <script src="../Asset/js/dashboard.js"></script>
    
    
</body>
</html>
            
        
                    
                    
                
     