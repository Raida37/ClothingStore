<?php

session_start();

require "../Model/connection.php";

$userModel = new UserModel($conn);

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$username = sanitize($_POST['username']);
	$password = sanitize($_POST['password']);

	if (empty($username) or empty($password)) {
		$_SESSION['error'] = "Please fill up the form properly.";
	}
	else {
		$isValid = $userModel->verifyCurrentPassword($username, $password);
		if ($isValid) {
			$_SESSION['hasLoggedIn'] = $username;
			header("Location: ../View/welcome.php");
			exit();
		}
		else {
			$_SESSION['error'] = "Username or password incorrect.";
		}
	}

	header("Location: ../View/loginView.php");
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}