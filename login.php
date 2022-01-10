<?php

session_start();

if( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;

}


require 'fungsispp.php';

if ( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];
    
    //cek apakah username sudah ada atau tidak
    $result = mysqli_query($conn, " SELECT * FROM tb_petugas WHERE username = '$username' ");

    if ( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);

        //tampil nama dan menu utama
        $_SESSION["namapetugas"] = $row["nama_petugas"];
        $_SESSION["level"] = $row["level"];

        if( password_verify($password, $row["password"]) ) {

            //set session
            $_SESSION["login"] = true;
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Aplikasi SPP</title>

    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.css">    
    <link rel="stylesheet" href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <style>
        body {background-color: #EAECEE;}
    </style>
</head>
<body>

<?php if ( isset($error) ) : ?>
    <div class="alert alert-danger text-center" role="alert">
    Username / Password Anda Salah
    </div>   
<?php endif; ?>

<h2 class="text-center mt-1">Login Users</h2>
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
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="password1">Ulang Password</label>
                            <input type="password" class="form-control" id="password1" name="password1" autocomplete="off" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="lihatpassword">
                            <label class="form-check-label" for="lihatpassword" name="lihatpassword">Lihat Password</label>
                        </div>
                        <button type="submit" class="btn btn-success" name="login" id="login">Log in</button> 
                        <p class="text-left">Belum Punya Akun Silahkan <a href="registrasi.php">Registrasi</a></p>
                        
                    </form>
            </div>
        </div>
    </div>


    <script src="assets/bootstrap-4.4.1-dist/js/jquery-3.4.1.slim.min.js"></script>
    <script src="assets/bootstrap-4.4.1-dist/js/popper.min.js"></script>
    <script src="assets/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>   
</body>
</html>