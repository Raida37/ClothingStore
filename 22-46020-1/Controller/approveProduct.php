<?php
    require('./checkLoggedIn.php');

    $id = $_REQUEST['id'];

    require "../Model/connection.php";
    
    $productModel = new ProductModel($conn);
    
    $result = $productModel->approveProduct($id);

    if ($result) {
        echo "Success";
    }else{
        echo "Failure";
    }


?>