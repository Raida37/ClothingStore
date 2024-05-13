<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {

include "db_conn.php";
include 'php/User.php';
$user = getUserById($_SESSION['id'], $conn);


 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">
	.auto-style1 {
		margin-top: 283px;
	}
	</style>
</head>
<body>
    <?php if ($user) { ?>
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<div class="shadow w-350 p-3 text-center" style="width: 500px; height: 70px">
    		<img src="upload/<?=$user['pp']?>"
    		     class="img-fluid rounded-circle">
            <h3 class="display-4 " style="height: 0px"><?=$user['fname']?></h3>
            <form class="auto-style1" method="post" style="height: 130px">
            <a href="edit.php" class="btn btn-primary" style="height: 38px">
            	Edit Profile
            </a>
             <a href="logout.php" class="btn btn-warning" style="width: 106px; height: 41px">&nbsp;&nbsp;
                Logout
            </a>
				<br><br><br><br>
				<a href="orders.php" class="btn btn-warning" style="width: 143px; height: 50px">&nbsp;&nbsp;
                Order List
            </a>
       </div>
    </div>
    <?php }else { 
     header("Location: login.php");
     exit;
    } ?>
</body>
</html>

<?php }else {
	header("Location: login.php");
	exit;
} ?>