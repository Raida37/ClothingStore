<?php
    session_start();

    $id = $_REQUEST['id'];

    require "../Model/connection.php";
    
    $productModel = new ProductModel($conn);
    
    $result = $productModel->rejectProduct($id);

    if ($result) {
        echo "Success";
    }else{
        echo "Failure";
    }


?>