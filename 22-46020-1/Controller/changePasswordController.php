<?php

require '../Model/connection.php'; 

session_start();


if (!isset($_SESSION['userId'])) {
    die('You must be logged in to access this page.');
}

$userModel = new UserModel($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    
    if ($newPassword !== $confirmPassword) {
        $errorMessage = "New passwords do not match.";
        include 'changePasswordView.php';
        exit;
    }

   
    if (!$userModel->verifyCurrentPassword($userId, $currentPassword)) {
        $errorMessage = "Current password is incorrect.";
        include '../View/changePasswordView.php';
        exit;
    }

   
    if ($userModel->updatePassword($userId, $newPassword)) {
        echo "Password changed successfully!";
        
    } else {
        $errorMessage = "Error changing password.";
        include '../View/changePasswordView.php';
    }
} else {
    include '../View/changePasswordView.php';
}
