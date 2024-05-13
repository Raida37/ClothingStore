<?php
    require('./checkLoggedIn.php');

    $id = $_REQUEST['id'];
    $amount = $_REQUEST['amount'];

    require "../Model/connection.php";
    
    $productModel = new ProductModel($conn);
    
    $result = $productModel->applyDiscount($id, $amount);

    if ($result) {
        echo "Success";
    }else{
        echo "Failure";
    }


?>