<?php
//hubungkan dengan functions
require 'fungsispp.php';
//ambil dan tampung id data yang ingin dihapus
$idspp = $_GET["idspp"] ;

if( hapus($idspp) > 0 ) {
    echo "    
          <script> 
            alert('Data BERHASIL di hapus');
            document.location.href = 'dataspp.php';
          </script>
    ";
} else {
    echo "    
          <script> 
            alert('Data GAGAL dihapus');
            document.location.href = 'dataspp.php';
          </script>
    ";
}
?>