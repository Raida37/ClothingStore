<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!--css file link-->
   <link rel="stylesheet" href="css/style.css">

</head>
<body></body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'user_db';

    $conn = mysqli_connect('localhost','root','','user_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    function generateSimplePassword($length = 8)
    {   
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= rand(1, 9);
    }
    return $password;
    }

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        $email = $conn->real_escape_string($_POST['email']);
        $new_password = generateSimplePassword();
        $sql_update = "UPDATE user_form SET password = '$new_password' WHERE email = '$email'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Password reset successfully. Your new password is: $new_password";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Enter your email:</label><br>
        <input type="email" id="email" name="email"><br>
        <input type="submit" value="Reset Password">
        <p>Back to login ! <a href="login.php">Login</a></p>
    </form>
</body>
</html>
