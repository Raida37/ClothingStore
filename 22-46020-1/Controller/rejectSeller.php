<?php
    session_start();

    $id = $_REQUEST['id'];

    require "../Model/connection.php";
    
    $sellerModel = new SellerModel($conn);
    
    $result = $sellerModel->rejectSeller($id);

    if ($result) {
        echo "Success";
    }else{
        echo "Failure";
    }


?>