<?php 
if(isset($_GET[deletea])){
  mysql_query("DELETE FROM tbl_dosen where id_dosen='$_GET[deletea]'");
  echo "<script>document.location='index.php?view=penulis';</script>";
}

if (isset($_GET[aktif])){
  if ($_GET[aktif]=='1'){
      $status = 'Aktif';
  }else{
      $status = 'Non Aktif';
  }
  mysql_query("UPDATE tbl_dosen SET akses='$status' where id_dosen='$_GET[iddosen]'");
  echo "<script>document.location='index.php?view=penulis';</script>";
}
?>
  <div class="alert alert-danger">
        Daftar Researcher / Author
    </div>
      <a style='margin-bottom:5px' class='btn btn-primary btn-sm' href='index.php?view=penulis&act=tambah'>Tambahkan Data</a>
    <table class="table table-condensed table-hover">
      <thead>
        <tr class="alert alert-success">
        <th>No</th>
        <th>Username</th>
        <th>Nama Lengkap</th>
        <th>No Telpon</th>
        <th>Jenis Kelamin</th>
        <th>Akses</th>
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
      <?php 
        $p      = new Paging;
        $batas  = 10;
        $posisi = $p->cariPosisi($batas);
        $no = $posisi+1;
        $kategori = mysql_query("SELECT * FROM tbl_dosen ORDER BY nama DESC LIMIT $posisi,$batas");
          while ($r = mysql_fetch_array($kategori)){
          echo "<tr>
              <th width=50px>$no</th>
              <td>$r[unama]</td>
              <td>$r[nama]</td>
              <td>$r[no_telpon]</td>
              <td>$r[jenis_kelamin]</td>
              <td>$r[akses]</td>
              <td width=140px>
                  <a class='btn btn-success btn-xs' href='index.php?view=penulis&act=edit&id=$r[id_dosen]'>Edit</a>
                  <a class='btn btn-danger btn-xs' href='index.php?view=penulis&deletea=$r[id_dosen]'>Delete</a>";
                  if ($r[akses]=='Aktif'){
                      echo "<a href='index.php?view=penulis&iddosen=$r[id_dosen]&aktif=0' style='width:35px; margin-left:5px' class='btn btn-warning btn-xs' onclick=\"return confirm('Are You Sure Non Aktif This User?')\"><i class='glyphicon glyphicon-thumbs-down'></i></a> ";
                  }else{
                      echo "<a href='index.php?view=penulis&iddosen=$r[id_dosen]&aktif=1' style='width:35px; margin-left:5px' class='btn btn-info btn-xs' onclick=\"return confirm('Are You Sure Aktif This User?')\"><i class='glyphicon glyphicon-thumbs-up'></i></a> ";
                  }
              echo "</td>
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