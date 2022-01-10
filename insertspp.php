<?php


// cek apakah tombol submit sudah ditekan
if ( isset($_POST["insertdata"]) ) {

    // ambil data dari tiap elemen form
    if( tambah($_POST) > 0 ) {
     echo "    
           <script> 
             alert('Data BERHASIL di SIMPAN');
             document.location.href = 'dataspp.php';
           </script>
     ";
       } else {
           echo "    
                 <script> 
                   alert('Data GAGAL di SIMPAN');
                   document.location.href = 'dataspp.php';
                 </script>
           ";
       }
 }
 
?>
 
<!----------------------------------- Modals Input data SPP ------------------------------------------------------------------->
<div class="modal fade" id="modalinputdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data SPP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="post">

        <div class="modal-body">
            <div class="form-group">
              <label>ID SPP</label>
              <input type="text" name="idspp" class="form-control" id="idspp" readonly>
            </div>
              
            <div class="form-group">
              <label>Tahun</label>
              <select name="tahun" class="form-control" id="tahun" required>
                <option selected="selected"></option>
                  <?php
                  for($i=date('Y'); $i>=date('Y')-5; $i-=1){
                  echo"<option value='$i'> $i </option>";
                  }
                  ?>
              </select>
            </div>
              
            <div class="form-group">
              <label>Nominal</label>
              <input type="number" name="nominal" class="form-control" id="nominal" required>
            </div>              
          </div>
            
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="insertdata">Save changes</button>
        </div>
            
      </form>

    </div>
  </div>
</div>
<!----------------------------- end modals input SPP----------------------------------------------------------->


