<?php
    session_start();
    require "../Model/connection.php";
    
    $transactionHistoryModel = new TransactionHistoryModel($conn);

    $transactionHistoryResults = $transactionHistoryModel->getTransactionHistory();

    echo json_encode($transactionHistoryResults);
?>