<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
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
		fieldset {
			width: 300px;
			padding: 20px;
			background-color: #fff;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		}
		label {
			font-weight: bold;
		}
		input[type="text"],
		input[type="password"] {
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

	<fieldset>
		<form action="../Controller/LoginController.php" method="post">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" value="">
			<br><br>

			<label for="password">Password</label>
			<input type="password" name="password" id="password" value="">
			<br><br>

			<input type="submit" value="Login" onclick="return validateLogin()">
		</form>
	</fieldset>

	<?php
		echo isset($_SESSION['error']) ? $_SESSION['error'] : "";
	?>
    <script>
        function validateLogin() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;
			let flag =true;

            if (username === "" || password === "") {
                alert("Please enter both username and password.");
                flag = false;
            }

            return flag;
        }
    </script>

</body>
</html>
