<?php
    require('./checkLoggedIn.php');
    require "../Model/connection.php";
    
    $productModel = new ProductModel($conn);

    $pendingProducts = $productModel->getPendingProducts();

    echo json_encode($pendingProducts);
?>