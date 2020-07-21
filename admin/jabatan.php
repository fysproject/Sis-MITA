<?php 
if (isset($_POST[simpana])){
  mysql_query("INSERT INTO tbl_jabatan VALUES('','$_POST[a]')");
  echo "<script>document.location='index.php?view=jabatan';</script>";
}

if(isset($_POST[updatea])){
  mysql_query("UPDATE tbl_jabatan SET nama_jabatan = '$_POST[a]' where id_jabatan='$_POST[aa]'");
  echo "<script>document.location='index.php?view=jabatan';</script>";
}

if(isset($_GET[deletea])){
  mysql_query("DELETE FROM tbl_jabatan where id_jabatan='$_GET[deletea]'");
  echo "<script>document.location='index.php?view=jabatan';</script>";
}
?>
  <div class="alert alert-danger">
        Semua Daftar Jabatan
    </div>
      <a style='margin-bottom:5px' class='btn btn-primary btn-sm' href='#' data-toggle="modal" data-target="#tambahjabatan">Tambahkan Data</a>
    <table class="table table-condensed table-hover">
      <thead>
        <tr class="alert alert-success">
        <th>No</th>
        <th>Nama Jabatan</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php 
        $p      = new Paging;
        $batas  = 10;
        $posisi = $p->cariPosisi($batas);
        $no = $posisi+1;
        $jabatan = mysql_query("SELECT * FROM tbl_jabatan ORDER BY id_jabatan DESC LIMIT $posisi,$batas");
          while ($r = mysql_fetch_array($jabatan)){
          echo "<tr>
              <th width=50px>$no</th>
              <td>$r[nama_jabatan]</td>
              <td width=110px><a class='open-AddBookDialog btn btn-success btn-xs' data-id='$r[id_jabatan]' data-id1='$r[nama_jabatan]' data-toggle='modal' href='#' data-target='#editjabatan'>Edit</a>
                  <a class='btn btn-danger btn-xs' href='index.php?view=jabatan&deletea=$r[id_jabatan]'>Delete</a>
              </td>
               </tr>
               </tbody>";
          $no++;
        }
          $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_jabatan"));
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
      <!-- Modal Master Data Perkara -->
    <div class="modal fade" id="tambahjabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Jabatan</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=jabatan" method='POST'>
                <div class="form-group">
                  <label for="a" class="col-sm-3 control-label">Jabatan</label>
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
    <div class="modal fade" id="editjabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Jabatan</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=jabatan" method='POST'>
                <div class="form-group">
                  <label for="a" class="col-sm-3 control-label">Jabatan</label>
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