<?php
require_once '../Model/connection.php';
require_once 'transactionhistoryView.php';

class TransactionController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new TransactionModel();
        $this->view = new TransactionView();
    }

    public function showTransactions() {
        $transactions = $this->model->getTransactionHistory();
        $this->view->render($transactions);
    }
}


$controller = new TransactionController();
$controller->showTransactions();
?>
