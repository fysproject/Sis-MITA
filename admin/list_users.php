<?php 
if(isset($_GET[deletea])){
  mysql_query("DELETE FROM tbl_users where id_users='$_GET[deletea]'");
  echo "<script>document.location='index.php?view=users&status=".$_GET[status]."';</script>";
}

?>
  <div class="alert alert-danger">
       Daftar <?php echo $_GET[status]; ?>
    </div>
      <a style='margin-bottom:5px' class='btn btn-primary btn-sm' href='index.php?view=users&act=tambah&status=<?php echo $_GET[status]; ?>'>Tambahkan Data</a>
    <table class="table table-condensed table-hover">
      <thead>
        <tr class="alert alert-success">
        <th>No</th>
        <th>Nama Lengkap</th>
        <th>No Telpon</th>
        <th>Jenis Kelamin</th>
        <th>Alamat Lengkap</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php 
        $p      = new Paging;
        $batas  = 10;
        $posisi = $p->cariPosisi($batas);
        $no = $posisi+1;
        $users = mysql_query("SELECT * FROM tbl_users where level='$_GET[status]' ORDER BY id_users DESC LIMIT $posisi,$batas");
          while ($r = mysql_fetch_array($users)){
          echo "<tr>
              <th width=50px>$no</th>
              <td>$r[nama_lengkap]</td>
              <td>$r[no_telpon]</td>
              <td>$r[jenis_kelamin]</td>
              <td>$r[alamat_lengkap]</td>
              <td width=140px>
                  <a class='btn btn-success btn-xs' href='index.php?view=users&act=edit&id=$r[id_users]&status=$_GET[status]'>Edit</a>
                  <a class='btn btn-danger btn-xs' href='index.php?view=users&deletea=$r[id_users]&status=$_GET[status]'>Delete</a>
              </td>
               </tr>
               </tbody>";
          $no++;
        }
          $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_kategori"));
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
    <div class="modal fade" id="tambahkategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Kategori</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kategorijournal" method='POST'>
                <div class="form-group">
                  <label for="a" class="col-sm-3 control-label">Kategori</label>
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
    <div class="modal fade" id="editkategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Kategori</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kategorijournal" method='POST'>
                <div class="form-group">
                  <label for="a" class="col-sm-3 control-label">Nama PA</label>
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