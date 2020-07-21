<?php 
	if (isset($_POST[submit])){
		$sekarangi = date("Y-m-d H:i:s");
		$dir_gambar = 'asset/files/';
		$filename = basename($_FILES['d']['name']);
		$filenamee = date("Ymd").'-'.basename($_FILES['d']['name']);
		$uploadfile = $dir_gambar . $filenamee;

		if ($filename != ''){
			if (move_uploaded_file($_FILES['d']['tmp_name'], $uploadfile)) {
				mysql_query("INSERT INTO tbl_dokumen VALUES('','$_GET[id]','$_SESSION[id]','$filenamee','$sekarangi')");
			}
		}else{
				mysql_query("INSERT INTO tbl_journal VALUES('','$_GET[id]','$_SESSION[id]','','$sekarangi')");
		}
		echo "<script>document.location='my-journal.mu';</script>";
	}
?>

<form action='' method='POST' class="form-horizontal" role="form" enctype='multipart/form-data'>
	<div class="form-group">
		<label for='inputEmail3' class='col-sm-1 control-label'>TOR</label>
		<div class="input-group col-lg-9">
			<div class="col-lg-7"><input type="file" class="form-control" name='d'></div>
		</div>
	</div>

	<div class="form-group">
		<label for='inputEmail3' class='col-sm-1 control-label'></label>
		<div class="col-sm-offset col-sm-9"><hr>
			<button type="submit" name='submit' class="btn btn-success">Submit</button><br><br>
		</div>
	</div>
</form>