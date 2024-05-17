<?php
include("php/config.php");

function displayMessage($message) {
    echo "<div class='message'><p>$message</p></div><br>";
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $password = $_POST['password'];

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        displayMessage("Invalid email format. Please enter a valid email.");
    } else {
       
        $stmt = mysqli_prepare($con, "SELECT Email FROM users WHERE Email=?");
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if(mysqli_stmt_num_rows($stmt) != 0) {
            displayMessage("This email is already in use. Please choose another one.");
        } else {
            

            $stmt = mysqli_prepare($con, "INSERT INTO users(Username, Email, Age, Password) VALUES(?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssis", $username, $email, $age, $password);
            mysqli_stmt_execute($stmt);

            displayMessage("Registration successful!");
            echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="mystyle.css">
    <title>Register</title> 
    <script>
        function validateForm() {
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var age = document.getElementById("age").value;
            var password = document.getElementById("password").value;

            if (username.trim() == "" || email.trim() == "" || age.trim() == "" || password.trim() == "") {
                alert("Please fill in all fields.");
                return false;
            }
            if (isNaN(age) || parseInt(age) < 18) {
                alert("Age must be 18 or greater.");
                return false;
            }
            var emailRegex = /^\S+@\S+\.\S+$/;
            if (!emailRegex.test(email)) {
                alert("Invalid email format.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <header>Sign Up</header>
            <?php
          
            if(isset($_POST['submit'])) {
                if (!empty($username) && !empty($email) && !empty($age) && !empty($password)) {
                    
                    displayMessage("Please correct the errors and try again.");
                }
            }
            ?>
            <form action="" method="post" onsubmit="return validateForm()" novalidate>
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off"  >
                </div>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="off"  >
                </div>
                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" autocomplete="off"  >
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off"  >
                </div>
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Register">
                </div>
                <div class="links">
                    Already a member? <a href="index.php">Log In</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
