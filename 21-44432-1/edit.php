<?php
session_start();

include("php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit(); 
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}


$username = $email = $age = $message = '';

$servername = "localhost";
$username_db = "root";
$password_db = "";
$database = "test_db";





if (isset($_POST['submit'])) {
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $age = intval($_POST['age']);

    if (empty($username) || empty($email) || empty($age)) {
        $message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {

        $stmt = $con->prepare("UPDATE users SET Username=?, Email=?, Age=? WHERE Id=?");
        $stmt->bind_param("ssii", $username, $email, $age, $_SESSION['id']);

        if ($stmt->execute()) {
            $message = "Profile Updated!";
        } else {
            $message = "Error occurred while updating profile.";
        }

        $stmt->close();
    }
}


$stmt = $con->prepare("SELECT Username, Email, Age FROM users WHERE Id=?");
$stmt->bind_param("i", $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($res_Uname, $res_Email, $res_Age);
$stmt->fetch();
$stmt->close();

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="mystyle.css">
    <title>Change Profile</title>
    <script>
    function validateForm() {
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var age = document.getElementById("age").value;

        if (username.trim() == "" || email.trim() == "" || age.trim() == "") {
            alert("All fields are required.");
            return false;
        }

        var emailRegex = /^\S+@\S+\.\S+$/;
        if (!emailRegex.test(email)) {
            alert("Invalid email format.");
            return false;
        }


        if (isNaN(age) || parseInt(age) < 18) {
            alert("Age must be 18 or greater.");
            return false;
        }

        return true;
    }
    </script>
</head>

<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Happy Shopping!</a> </p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="?logout=1"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php if (!empty($message)) : ?>
                <div class='message'>
                    <p><?php echo $message; ?></p>
                </div> <br>
            <?php endif; ?>
            <header>Change Profile</header>
            <form action="" method="post" onsubmit="return validateForm()">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname; ?>" autocomplete="off">
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" >
                </div>

                <div class="field input">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" value="<?php echo $res_Age; ?>" autocomplete="off" >
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>

            </form>
        </div>
    </div>
</body>

</html>
