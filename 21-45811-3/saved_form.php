<?php
include 'db_conn.php'; 
session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
   exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
   <title>Addresses page</title>
   <style>
        
          .inline-image {
            display: inline-block;
            margin: 20px; 
            text-align: center; 
        }

        .inline-image img {
            width: 150px; 
            height: auto; 
        }

      
        .button {
            display: block; 
            margin-top: 10px; 
            padding: 50px 10px; 
            background-color: #d70636;
            color: black;
            width: 150px;
            height: 50px;
            font-size: 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #d70636;
        }

        .button {
            display: block; 
            margin-top: 10px; 
            padding: 5px 10px; 
            background-color: seagreen;
            color: black;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .button:hover {
            background-color: whitesmoke;
        }
</style>

   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
        <button class="button" onclick="window.location.href='admin_page.php'" target="_blank">Back</button>
  
      <h1>Saved Addresses</h1> 
       <br></br>
      <h2>User Addresses:</h2>
       <br></br>
  <div class="inline-image">
        <img src="logo.png">
        <p class="image-name">Bashundhara R/A</p>
        <button class="button" onclick="window.location.href='https://maps.app.goo.gl/Tci2VN3N4wjsWYyQ6'" target="_blank">Go</button>
     </div>

 <div class="inline-image">
        <img src="logo.png">
        <p class="image-name">Dhanmondi</p>
        <button class="button" onclick="window.location.href='https://maps.app.goo.gl/QbdHRaeQJjVkZccf8'" target="_blank">Go</button>
     </div>
    <div class="inline-image">
        <img src="logo.png">
        <p class="image-name">Khilgaon</p>
        <button class="button" onclick="window.location.href='https://maps.app.goo.gl/KtdU7vz25HvzoKak9'" target="_blank">Go</button>
     </div>
         <div class="inline-image">
        <img src="logo.png">
        <p class="image-name">Uttara</p>
        <button class="button" onclick="window.location.href='https://maps.app.goo.gl/k7aDvJr5CqU2iNUf7'" target="_blank">Go</button>
     </div>
      <div class="inline-image">
        <img src="logo.png">
        <p class="image-name">Badda</p>
        <button class="button" onclick="window.location.href='https://maps.app.goo.gl/knUatBGPn25Vbjnw6'" target="_blank">Go</button>
     </div>
      <div class="inline-image">
        <img src="logo.png">
        <p class="image-name">Mirpur</p>
        <button class="button" onclick="window.location.href='https://maps.app.goo.gl/MXijPouU7DENwGe5A'" target="_blank">Go</button>
     </div>

   
</body>
</html>