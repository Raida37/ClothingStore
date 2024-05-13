<?php
    require('../Controller/checkLoggedIn.php');
    require "../Model/connection.php";
    
    $sellerModel = new SellerModel($conn);

    $pendingSellers = $sellerModel->getPendingSellers();

    echo json_encode($pendingSellers);
?>