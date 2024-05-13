<?php
    session_start();
    require "../Model/connection.php";
    
    $sellerModel = new SellerModel($conn);

    $pendingSellers = $sellerModel->getPendingSellers();

    echo json_encode($pendingSellers);
?>