<?php


// cek apakah tombol submit sudah ditekan
if ( isset($_POST["updatedata"]) ) {

    // ambil data dari tiap elemen form
    if( ubahspp($_POST) > 0 ) {
     echo "    
           <script> 
             alert('Data BERHASIL di UBAH');
             document.location.href = 'dataspp.php';
           </script>
     ";
       } else {
           echo "    
                 <script> 
                   alert('Data GAGAL di UBAH');
                   document.location.href = 'dataspp.php';
                 </script>
           ";
       }
 }
 
?>
 

<!----------------------------------- Modals EDIT data SPP ------------------------------------------------------------------->
<div class="modal fade" id="modaleditdata<?= $spp["id_spp"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data SPP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="post">

        <div class="modal-body">
            <div class="form-group">
              <label>ID SPP</label>
              <input type="text" name="idspp" class="form-control" id="idspp" readonly value="<?= $spp["id_spp"]; ?>">
            </div>
              
            <div class="form-group">
              <label>Tahun</label>
              <select name="tahun" class="form-control" id="tahun" required>
                <option selected="selected"><?= $spp["tahun"]; ?></option>
                  <?php
                  for($ii=date('Y'); $ii>=date('Y')-5; $ii-=1){
                  echo"<option value='$ii'> $ii </option>";
                  }
                  ?>
              </select>
            </div>
              
            <div class="form-group">
              <label>Nominal</label>
              <input type="number" name="nominal" class="form-control" id="nominal" required value="<?= $spp["nominal"]; ?>">
            </div>              
          </div>
            
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info" name="updatedata">Update Data</button>
        </div>
            
      </form>

    </div>
  </div>
</div>
<!----------------------------- end modals edit SPP----------------------------------------------------------->


