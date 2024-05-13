
<?php
    // Start the session
    session_start();

    // Include the Connection.php file
    require "../Model/Connection.php";

    // Check if the user is logged in
    if (!isset($_SESSION['hasLoggedIn']) || empty($_SESSION['hasLoggedIn'])) {
        // Redirect to the login page if not logged in
        header("Location: loginView.php");
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome | App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            color: #333;
        }
        hr {
            margin-top: 20px;
            margin-bottom: 20px;
            border: 0;
            border-top: 1px solid #ccc;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h3>Welcome <?php echo $_SESSION['hasLoggedIn']; ?> to my app</h3>

        <hr>

        <a href="./dashboardView.php">Dashboard</a> <br>
        <a href="./transactionhistoryView.php">Transaction History</a> <br>
        <a href="./sellerApprovalView.php">Seller Approval</a> <br>
        <a href="./productApprovalView.php">Product Approval</a> <br>
        <a href="./productDiscountView.php">Product Discount</a> <br>
        <a href="./updateProfileView.php">Update Profile</a> <br>
        <a href="../Controller/Logout.php">Logout</a>
    </div>

</body>
</html>
