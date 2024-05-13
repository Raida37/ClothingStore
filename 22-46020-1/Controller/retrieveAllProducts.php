<?php
    require('./checkLoggedIn.php');
    require "../Model/connection.php";
    
    $productModel = new ProductModel($conn);

    $allProducts = $productModel->getAllProducts();

    echo json_encode($allProducts);
?>