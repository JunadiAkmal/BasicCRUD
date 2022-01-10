<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <a class="navbar-brand mr-5" href="#">Aplikasi SPP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
  <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Halaman Utama</span></a>
      </li>
      

<?php
//JIKA USER STATUSNYA ADMIN MUNCULKAN MENU DATA MASTER
if( $_SESSION["level"] == "ADMIN" ) 
{ 
?>
  
      <li class="nav-item dropdown ml-4">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Data Master
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Data Kelas</a>
        <a class="dropdown-item" href="dataspp.php">Data SPP</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">Data Siswa</a>
      </div>
    </li>

    <li class="nav-item dropdown ml-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
          <a class="dropdown-item" href="#">Pembayaran SPP</a>         
        </div>
      </li>

      <li class="nav-item dropdown ml-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
          <a class="dropdown-item" href="#">Data Siswa</a>         
          <a class="dropdown-item" href="#">Data Pembayaran SPP</a>         
        </div>
      </li>

      <li class="nav-item ml-4">
        <a class="nav-link" href="#">Informasi Pembayaran</a>
      </li>

<?php 
}
?>



<?php
//JIKA USER STATUSNYA PETUGAS MUNCULKAN MENU INI
if( $_SESSION["level"] == "PETUGAS" ) 
{ 
?>

      <li class="nav-item dropdown ml-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transaksi
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
          <a class="dropdown-item" href="#">Pembayaran SPP</a>         
        </div>
      </li>

      <li class="nav-item dropdown ml-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Laporan
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
          <a class="dropdown-item" href="#">Data Siswa</a>         
          <a class="dropdown-item" href="#">Data Pembayaran SPP</a>         
        </div>
      </li>

      <li class="nav-item ml-4">
        <a class="nav-link" href="#">Informasi Pembayaran</a>
      </li>
      
<?php 
}
?>



<?php
//JIKA USER STATUSNYA SISWA MUNCULKAN INFORMASI PEMBAYARAN
if( $_SESSION["level"] == "SISWA" ) 
{ 
?>
      <li class="nav-item ml-4">
        <a class="nav-link" href="#">Informasi Pembayaran</a>
      </li>
    

<?php 
}
?>

    </ul>
    

    <ul class="nav justify-content-end">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            NAMA <?php echo $_SESSION["level"]; ?>  :  <?php echo $_SESSION["namapetugas"]; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
            <a class="dropdown-item" href="#">Edit User</a>
            <a class="dropdown-item" href="#">Tambah User</a>
            <div class="dropdown-divider"></div>
            <a href="logout.php" class="dropdown-item" onclick="return confirm('Yakin ingin Keluar ?');"  >Logout</a>         
          </div>
        </li>
    </ul>    
  </div>
</nav>
<!-- navbar end -->

