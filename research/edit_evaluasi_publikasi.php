<?php 
	if (isset($_POST[submit])){
		$sekarangi = date("Y-m-d H:i:s");
		$dir_gambar = 'asset/files/';
		$filename = basename($_FILES['d']['name']);
		$filenamee = date("Ymd").'-'.basename($_FILES['d']['name']);
		$uploadfile = $dir_gambar . $filenamee;
		if ($filename != ''){
			if (move_uploaded_file($_FILES['d']['tmp_name'], $uploadfile)) {
				mysql_query("UPDATE tbl_dokresevapub SET file_evapub ='$filenamee' where id_journal='$_GET[id]'");
			}
		}else{
				mysql_query("UPDATE tbl_dokresevapub SET file_evapub ='' where id_journal='$_GET[id]'");
		}
		echo "<script>document.location='evaluasi.mdn';</script>";
	}
?>

<form action='' method='POST' class="form-horizontal" role="form" enctype='multipart/form-data'>
	<div class="form-group">
		<label for='inputEmail3' class='col-sm-1 control-label'>Dokumen</label>
		<div class="input-group col-lg-9">
			<div class="col-lg-7"><input type="file" class="form-control" name='d'></div>
		</div>

	<div class="form-group">
		<label for='inputEmail3' class='col-sm-1 control-label'></label>
		<div class="col-sm-offset col-sm-9"><hr>
			<button type="submit" name='submit' class="btn btn-success">Update</button><br><br>
		</div>
	</div>
</form>