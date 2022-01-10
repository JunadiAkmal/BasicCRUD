<?php

session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;

}


require 'fungsispp.php';
$dataspp = query("SELECT * FROM tb_spp ORDER BY id_spp DESC ");

//tombol cari ditekan
if ( isset($_POST["cari"]) ) {
  $dataspp= caridata($_POST["katakunci"]);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data SPP</title>
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.css">    
    <link rel="stylesheet" href="assets/bootstrap-4.4.1-dist/css/bootstrap.min.css">
    <!-- link data tables css-->
    <link rel="stylesheet" href="assets/data-tables/dataTables.bootstrap4.min.css">

</head>
<?php include 'templates/navbarmenu.php' ?>

<!-- konten awal -->
<div class="container">

      <div class="card mt-2">
        <h4 class="text-center">SMKS Muhammadiyah Bungoro | Tahun Ajaran 2021-2022</h4>
        <marquee behavior="alternate">Alamat : Jl. Pelabuhan Biringkassi Raya No. 10.A Kec. Bungoro-Pangkep</marquee>
      <div class="card">

        <div class="card-body">
          <div class="float-left">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalinputdata">Tambah Data SPP</button>
              <!-- panggil modals tambah data -->
              <?php include 'insertspp.php' ?>
              <!-- end panggil modals tambah data -->
          </div>

          <form action="" method="post">
          <div class="float-right"><input type="text" name="katakunci" id="txtcari" size="30" placeholder="Search..." autocomplete="off" autofocus ><button type="submit" class="btn btn-info ml-2 btn-sm" name="cari" id="cari">Cari Data</button></div>
          </form>
          <table id="table-spp" class="table table-striped table-sm">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Aksi</th>
                <th scope="col">ID SPP </th>
                <th scope="col">Tahun</th>
                <th scope="col">Nominal</th>
              </tr>
            </thead>
            <tbody>

                <?php $i = 1; ?>
                <?php foreach( $dataspp as $spp) :  ?>
                  
              <tr>
                <td><?= $i; ?></td>
                <td>
                <a href="updatespp.php?idspp=<?= $spp["id_spp"]; ?>" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modaleditdata<?= $spp["id_spp"]; ?>"> Ubah </button></a>
                <a href="deletespp.php?idspp=<?= $spp["id_spp"]; ?>" onclick="return confirm('Anda Yakin Ingin Hapus Data ini');"><button class="btn btn-danger btn-sm">Hapus</button></a>
                </td>               
                <td><?= $spp["id_spp"]; ?></td>
                <td><?= $spp["tahun"]; ?></td>
                <td><?= $spp["nominal"]; ?></td>
              </tr>
     
              <?php $i++; ?>

              <!-- panggil modals tambah data -->
              <?php include 'updatespp.php' ?>
              <!-- end panggil modals tambah data -->

              <?php endforeach; ?>
                

            </tbody>

          </table>
        </div>
      </div>

  
</div>
<!-- konten akhir -->

    <script src="assets/bootstrap-4.4.1-dist/js/jquery-3.4.1.slim.min.js"></script>
  <!-- link data tables js -->
    <script src="assets/data-tables/jquery.dataTables.min.js"></script>
    <script src="assets/data-tables/dataTables.bootstrap4.min.js"></script>
     <!-- end link data tables js -->
    <script src="assets/bootstrap-4.4.1-dist/js/popper.min.js"></script>
    <script src="assets/bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>


  <!-- data tables untuk pencarian data -->
  <script>
      $(document).ready(function() {
          $('#table-spp').DataTable(
            {
            "bFilter": false //klik link http://legacy.datatables.net/usage/features 
             //untuk menonaktifkan yang tidak diingikan tampil pada tabel
            }
            );
          
      } );
  </script>

</body>
</html>

