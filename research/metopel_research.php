<?php 
	if (isset($_POST[submit])){
		$sekarangi = date("Y-m-d H:i:s");
		$dir_gambar = 'asset/files/';
		$filename = basename($_FILES['d']['name']);
		$filenamee = date("Ymd").'-'.basename($_FILES['d']['name']);
		$uploadfile = $dir_gambar . $filenamee;
		if ($filename != ''){
			if (move_uploaded_file($_FILES['d']['tmp_name'], $uploadfile)) {
				mysql_query("INSERT INTO tbl_dokins VALUES('','$_GET[id]','$_SESSION[id]','$filenamee','$sekarangi')");
				mysql_query("UPDATE tbl_journal SET id_metode ='$_POST[a]' where id_journal='$_GET[id]'");
			}
		}else{
				mysql_query("INSERT INTO tbl_dokins VALUES('','$_GET[id]','$_SESSION[id]','','$sekarangi')");
		}
		echo "<script>document.location='my-journal.mu';</script>";
	}
	$e = mysql_fetch_array(mysql_query("SELECT * FROM tbl_journal where id_journal='$_GET[id]'"));
?>

<form action='' method='POST' class="form-horizontal" role="form" enctype='multipart/form-data'>
	<div class="form-group">
		<label for='inputEmail3' class='col-sm-1 control-label'>Metodologi Penelitian</label>
		<div class="input-group col-lg-9">
			<div class="col-lg-5">
				<input type="hidden" value='<?php echo $e[id_journal]; ?>' name='id' required>
				<select class="form-control " name='a'>
					<option value='0'>Pilih</option>
					<?php
					$metopel = mysql_query("SELECT * FROM tbl_metode_penelitian");
					while ($mp = mysql_fetch_array($metopel)){
						if ($e[id_metode]==$mp[id_metode]){
							echo "<option value='$mp[id_metode]' selected>$mp[metode_penelitian]</option>";
						}else{
							echo "<option value='$mp[id_metode]'>$mp[metode_penelitian]</option>";
						}
					}
					?>
				</select>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label for='inputEmail3' class='col-sm-1 control-label'>Instrument Research</label>
		<div class="input-group col-lg-9">
			<div class="col-lg-7"><input type="file" class="form-control" name='d' required</div>
		</div>
	</div>

	<div class="form-group">
		<label for='inputEmail3' class='col-sm-1 control-label'></label>
		<div class="col-sm-offset col-sm-9"><hr>
			<button type="submit" name='submit' class="btn btn-success">Submit</button><br><br>
		</div>
	</div>
</form>