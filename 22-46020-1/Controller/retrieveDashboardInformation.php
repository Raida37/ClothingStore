<?php
    require('./checkLoggedIn.php');

    require "../Model/connection.php";
    
    $sellerModel = new SellerModel($conn);
    $transactionHistoryModel = new TransactionHistoryModel($conn);
    $productModel = new ProductModel($conn);
    
    $totalProducts = $productModel->getTotalProducts();
    $totalProductPrice = $productModel->getTotalProductPrice();

    $totalSellers = $sellerModel->getTotalSellers();
    $totalTransactions = $transactionHistoryModel->getTotalTransactions();

    $topSellers = $sellerModel->getTopSellers();

    $result = [];
    $result['totalProducts'] = $totalProducts;
    $result['totalProductPrice'] = $totalProductPrice;
    $result['totalSellers'] = $totalSellers;
    $result['totalTransactions'] = $totalTransactions;
    $result['topSellers'] = $topSellers;

    echo json_encode($result);

    


?>