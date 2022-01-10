<?php

session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;

}


//require 'fungsispp.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.css">    
    <link rel="stylesheet" href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css">
</head>
<?php include 'templates/navbarmenu.php' ?>

<!-- konten awal -->
<div class="container mt-2">
  
  <div class="content">
    <h2>INI ADALAH MENU UTAMA</h2>
  </div>
  
</div>
<!-- konten akhir -->

    <script src="assets/bootstrap-4.4.1-dist/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/bootstrap-4.4.1-dist/js/popper.min.js"></script>
    <script src="assets/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>    
</body>
</html>