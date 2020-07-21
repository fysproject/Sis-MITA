<?php 
if (isset($_POST[simpana])){
  mysql_query("INSERT INTO tbl_metode_penelitian VALUES('','$_POST[a]')");
  echo "<script>document.location='index.php?view=metodologi';</script>";
}

if(isset($_POST[updatea])){
  mysql_query("UPDATE tbl_metode_penelitian SET metode_penelitian = '$_POST[a]' where id_metode='$_POST[aa]'");
  echo "<script>document.location='index.php?view=metodologi';</script>";
}

if(isset($_GET[deletea])){
  mysql_query("DELETE FROM tbl_metode_penelitian where id_metode='$_GET[deletea]'");
  echo "<script>document.location='index.php?view=metodologi';</script>";
}
?>
  <div class="alert alert-info">
        Daftar Metodologi Penelitian
    </div>
      <a style='margin-bottom:5px' class='btn btn-info btn-sm' href='#' data-toggle="modal" data-target="#tambahmetopel">Tambahkan Data</a>
    <table class="table">
      <thead>
        <tr class="alert">
        <th>No</th>
        <th>Metodologi Penelitian</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php 
        $p      = new Paging;
        $batas  = 10;
        $posisi = $p->cariPosisi($batas);
        $no = $posisi+1;
        $metopel = mysql_query("SELECT * FROM tbl_metode_penelitian ORDER BY id_metode DESC LIMIT $posisi,$batas");
          while ($mp = mysql_fetch_array($metopel)){
          echo "<tr>
              <th width=50px>$no</th>
              <td>$mp[metode_penelitian]</td>
              <td width=110px><a class='open-AddBookDialog btn btn-success btn-xs' data-id='$mp[id_metode]' data-id1='$mp[metode_penelitian]' data-toggle='modal' href='#' data-target='#editmetodologi'>Edit</a>
                  <a class='btn btn-danger btn-xs' href='index.php?view=metodologi&deletea=$mp[id_metode]'>Delete</a>
              </td>
               </tr>
               </tbody>";
          $no++;
        }
          $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_metode_penelitian"));
          $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
          $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
      ?>
    </table>
          <nav>
            <ul class="pagination">
              <?php echo $linkHalaman ?>
            </ul>
          </nav>

<?php if (isset($_SESSION[admin])){  ?>
    <div class="modal fade" id="tambahmetopel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Metodologi</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=metodologi" method='POST'>
                <div class="form-group">
                  <label for="a" class="col-sm-3 control-label">Metodologi</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id='a' name="a" required>
                  </div>
                </div>

          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpana' class="btn btn-primary btn-sm">Tambahkan</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Modal Master Data Perkara -->
    <div class="modal fade" id="editmetodologi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Metodologi</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=metodologi" method='POST'>
                <div class="form-group">
                  <label for="a" class="col-sm-3 control-label">Metodologi Penelitian</label>
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" id='bookId' name="aa" required>
                    <input type="text" class="form-control" id='bookId1' name="a" required>
                  </div>
                </div>
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='updatea' class="btn btn-primary btn-sm">Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>
<?php } ?>