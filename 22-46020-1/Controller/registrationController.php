<?php

require '../Model/connection.php'; 


$userModel = new UserModel($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    

    if ($userModel->usernameExists($username)) {
        $errorMessage = "Username already exists. Please choose another username.";
        include '../View/registrationView.php'; 
    } else {
       
        $result = $userModel->createUser($username, $email, $password);
        if ($result) {
            
            echo "Registration successful! <a href='../View/loginView.php'>Log in</a>";
        } else {
            
            $errorMessage = "Error during registration. Please try again.";
            include '../View/registrationView.php';
        }
    }
} else {
    
    include '../View/registrationView.php';
}
