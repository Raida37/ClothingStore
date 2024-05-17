<?php 
   session_start();

   if(isset($_SESSION['user_id'])) {
    header("Location: home.php");

    
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="mystyle.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
             
              include("php/config.php");
              if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($con,$_POST['email']);
                $password = mysqli_real_escape_string($con,$_POST['password']);

                 if(empty($email) || empty($password)) {
        echo "<div class='message'>
                  <p>Please fill in all fields.</p>
              </div> <br>";
        echo "<a href='index.php'><button class='btn'>Go Back</button>";
        exit(); 
    }

                $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                $row = mysqli_fetch_assoc($result);

                if(is_array($row) && !empty($row)){
                    $_SESSION['valid'] = $row['Email'];
                    $_SESSION['username'] = $row['Username'];
                    $_SESSION['age'] = $row['Age'];
                    $_SESSION['id'] = $row['Id'];
                }else{
                    echo "<div class='message'>
                      <p>Wrong Username or Password</p>
                       </div> <br>";
                   echo "<a href='index.php'><button class='btn'>Go Back</button>";
         
                }
                if(isset($_SESSION['valid'])){
                    header("Location: home.php");
                }
              }else{

            
            ?>
            <header>Login</header>
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
            var emailRegex = /^\S+@\S+\.\S+$/;
            if (!emailRegex.test(email)) {
                alert("Invalid email format.");
                return false;
            }
            return true;
        }
    </script>

            <form action="" method="post" novalidate>
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="on" >
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" >

                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Login" >
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Create An Account</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>