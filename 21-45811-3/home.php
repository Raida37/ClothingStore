<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
	.auto-style1 {
		text-align: center;
	}
	</style>
</head>
<body>
     <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
     <nav class="auto-style1">
     	<a href="change-password.php">Change Password</a>
        <br><br>
        <a href="logout.php">Logout</a>
        
     </nav>
     
	 <div class="auto-style1">
		 <br>
     
</body>
</html>
<a href="browse.php">Browse</a> <br>
</div>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>