
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {c  
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 8px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registration</h2>
        <form id="registrationForm" action="../Controller/registrationController.php" method="POST" novalidate>
            <input type="text" name="username" id="username" placeholder="Username">
            <span id="usernameError" class="error"></span>
            <input type="email" name="email" id="email" placeholder="Email">
            <span id="emailError" class="error"></span>
            <input type="password" name="password" id="password" placeholder="Password">
            <span id="passwordError" class="error"></span>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
            <span id="cpasswordError" class="error"></span>
            <button type="submit" onclick="return validateForm()">Register</button>
        </form>
        <p>Already Have an Account?</p>
        <a href="./loginView.php">Log-in</a>
    </div>

    <script>
        function validateReg() {
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const cpassword = document.getElementById('cpassword').value;
            const usernameError = document.getElementById('usernameError');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            const cpasswordError = document.getElementById('cpasswordError');
            const isValid = true;

            usernameError.innerHTML = '';
            emailError.innerHTML = '';
            passwordError.innerHTML = '';
            cpasswordError.innerHTML = '';

            if (username.trim() === '') {
                usernameError.innerHTML = 'Username is required';
                isValid = false;
            }

            if (email.trim() === '') {
                emailError.innerHTML = 'Email is required';
                isValid = false;
            } else if (!isValidEmail(email)) {
                emailError.innerHTML = 'Invalid email format';
                isValid = false;
            }

            if (password.trim() === '') {
                passwordError.innerHTML = 'Password is required';
                isValid = false;
            }

            if (cpassword.trim() === '') {
                cpasswordError.innerHTML = 'Confirm Password is required';
                isValid = false;
            } else if (password !== cpassword) {
                cpasswordError.innerHTML = 'Passwords do not match';
                isValid = false;
            }

            return isValid;
        }

        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
</body>
</html>
