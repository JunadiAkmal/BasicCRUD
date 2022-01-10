<?php

require 'fungsispp.php';


// cek apakah tombol submit sudah ditekan
if ( isset($_POST["registrasi"]) ) {

    // ambil data dari tiap elemen form
    if( tambahuser($_POST) > 0 ) {
     echo "    
           <script> 
             alert('User BERHASIL di TAMBAHKAN, silahkan ke menu LOGIN');
             document.location.href = 'login.php';
           </script>
     ";
       } else {
           echo mysqli_error($conn);
       }
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Aplikasi SPP</title>

    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.css">    
    <link rel="stylesheet" href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <style>
        body {background-color: #EAECEE;}
    </style>
</head>
<body>
<h2 class="text-center mt-1">Form Registrasi</h2>
    <div class="container">    
        <div class="row justify-content-md-center">        
            <div class="col col-sm-4" style="background-color: #ffefd5">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="email" class="form-control" id="username" name="username" autocomplete="off" autofocus required>  
                            <small id="emailHelp" class="form-text text-muted">Contoh Username: junadisangpemikir@gmail.com</small>                          
                        </div>
                        <div class="form-group">
                            <label for="namapetugas">Nama Pengguna</label>
                            <input type="text" class="form-control" id="namapetugas" name="namapetugas" autocomplete="off" required>
                            <small id="emailHelp" class="form-text text-muted">Contoh Nama Pengguna: Junadi Sang Pemikir</small>                        
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="password1">Ulang Password</label>
                            <input type="password" class="form-control" id="password1" name="password1" autocomplete="off" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="lihatpassword" onclick="tampilpassword()">
                            <label class="form-check-label" for="lihatpassword" name="lihatpassword">Lihat Password</label>
                        </div>
                        <div class="form-group">
                            <label for="username">Level Pengguna</label>
                            <select name="level" class="form-control" id="tahun" required>
                                <option selected="selected"></option>
                                <option>ADMIN</option>
                                <option>PETUGAS</option>
                                <option>SISWA</option>
                            </select>                           
                        </div>
                        <button type="submit" class="btn btn-success" name="registrasi" id="registrasi">Registrasi</button> 
                        <p class="text-left">Sudah Punya Akun Silahkan <a href="login.php">Login</a></p>
                        
                    </form>
            </div>
        </div>
    </div>


    <script src="assets/bootstrap-4.4.1-dist/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/bootstrap-4.4.1-dist/js/popper.min.js"></script>
    <script src="assets/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
    <script>
        function tampilpassword() {
        var x = document.getElementById("password");
        var xx = document.getElementById("password1");
            if (x.type === "password") {
            x.type = "text";            
            xx.type = "text";            
            } else {
            x.type = "password";
            xx.type = "password";
            }
        }
        
  </script>
</body>
</html>