<!-- Modal cari Nomor Perkara dalam -->
<div class="modal fade" id="tambahrevisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Review</h4>
      </div>
      <div class="modal-body">
          <form action='detail-journal-<?php echo $_GET[journal]; ?>.mu' method='POST'>
            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Review</label>
              <div class="input-group col-lg-10">
                <textarea name='a' class='form-control' style='width:100%; height:250px'></textarea>
              </div>
            </div>
      </div>
      <div style='clear:both' class="modal-footer">
        <button type="submit" name='simpan' class="btn btn-primary btn-sm">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal cari Nomor Perkara dalam -->
<div class="modal fade" id="tambahrevisii" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Review</h4>
      </div>
      <div class="modal-body">
          <form action='detail-journal-<?php echo $_GET[id]; ?>.mu' method='POST'>
            <div class="form-group col-sm-12">
              <label class="col-sm-2 control-label">Review</label>
              <div class="input-group col-lg-10">
                <textarea name='a' class='form-control' style='width:100%; height:250px'></textarea>
              </div>
            </div>
      </div>
      <div style='clear:both' class="modal-footer">
        <button type="submit" name='simpan' class="btn btn-primary btn-sm">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="download" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Pemberitahuan !!!</h4>
      </div>
      <div class="modal-body">
         <center>Maaf, file yang ingin Anda download tidak tersedia <br>
                  atau filenya (direktorinya) telah diproteksi.<br><br><br>
          </center>
      </div>
    </div>
  </div>
</div>

