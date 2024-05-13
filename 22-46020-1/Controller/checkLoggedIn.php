<?php 
    session_start();
    if(!isset($_SESSION['hasLoggedIn'])){
        header('location: ../View/loginView.php');
    }
?>