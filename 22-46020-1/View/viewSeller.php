<?php
 require('../Controller/checkLoggedIn.php');
 require ('../Model/connection.php');
 $query = "SELECT * FROM seller ";
 $result = mysqli_query ($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Seller Details </title>
</head>
<body>
    <div class= "container">
     <div class ="row mt-5">
      <div class = "col">
         <div class = "card mt-5">
            <div class = "card-header ">
              <h2 class ="display - 6 text-center"> Seller Details</h2>
            </div>
            <div class = "card-body">
                    <table class = "table table-bordered">
                        <tr>
                            <td>Userid </td>
                            <td>Seller Name </td>
                            <td>Shop </td>
                            <td>E-mail </td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                         <tr>
                        
        <?php
    while($row = mysqli_fetch_assoc($result))
        {
        ?>
            <td><?php echo $row['userid']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['shopname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td> <a href="#" class="btn btn-primary">Edit</a></td>
            <td> <a href="#" class="btn btn-danger">Delete</a></td>

                        </tr>
        <?php
        }
        ?>
                    </table>

            </div>
         </div>
      </div>
     </div>
    </div>

</body>
</html>