<?php
require('../Controller/checkLoggedIn.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px 0;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Update Profile</h1>
        <?php if (isset($errorMessage)) echo "$errorMessage"; ?>
        <form action="updateProfileController.php" method="post">
            <label for="username">New Username:</label><br>
            <input type="text" id="username" name="username" required><br>

            <label for="password">New Password:</label><br>
            <input type="password" id="password" name="password" required><br>

            <label for="email">New Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <input type="submit" value="Update Profile">
        </form>
    </div>
</body>
</html>
