<?php

require '../Model/connection.php';

session_start();


if (!isset($_SESSION['userId'])) {
    die('You must be logged in to access this page.');
}

$userModel = new UserModel($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION['userId']; 
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    
    $result = $userModel->updateProfile($userId, $username, $password, $email);
    if ($result) {
        echo "Profile updated successfully!";
        
    } else {
       
        $errorMessage = "Error updating profile.";
        include '../View/updateProfileView.php';
    }
} else {
    
    include '../View/updateProfileView.php';
}
