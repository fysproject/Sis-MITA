<?php 
	if (isset($_POST[update])){
		$dir_gambar = 'asset/files/';
		$filename = basename($_FILES['d']['name']);
		$filenamee = date("Ymd").'-'.basename($_FILES['d']['name']);
		$uploadfile = $dir_gambar . $filenamee;

		if ($filename != ''){
			if (move_uploaded_file($_FILES['d']['tmp_name'], $uploadfile)) {
				mysql_query("UPDATE tbl_journal SET judul 		= 	'$_POST[b]',
													abstrak 	= 	'$_POST[c]',
													tujuan_penelitian = '$_POST[e]',
													metode = '$_POST[f]',
													latar_belakang = '$_POST[g]' where id_journal='$_GET[id]'");
			}
		}else{
				mysql_query("UPDATE tbl_journal SET judul 		= 	'$_POST[b]',
													abstrak 	= 	'$_POST[c]',
													tujuan_penelitian = '$_POST[e]',
													metode = '$_POST[f]',
													latar_belakang = '$_POST[g]' where id_journal='$_GET[id]'");
		}
		echo "<script>document.location='index.php?view=journaladmin';</script>";
	}
	$e = mysql_fetch_array(mysql_query("SELECT * FROM tbl_journal where id_journal='$_GET[id]'"));
?>
<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
		<?php 
				echo "Edit Penelitian";
		?>
	    </div>
	    <form action='' method='POST' class="form-horizontal" role="form" enctype='multipart/form-data'>
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Judul</label>
							  <div class="input-group col-lg-9">
							  	<div class="col-lg-12"><input type="text" class="form-control" value='<?php echo $e[judul]; ?>' name='b' required>   </div>
							  </div>
							  </div>
							  							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Rumusan Masalah</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:50px' class="form-control" name='c' required><?php echo $e[abstrak]; ?></textarea></div>
								</div>
							  </div>

							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Tujuan Penelitian</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:50px' class="form-control" name='e' required><?php echo $e[tujuan_penelitian]; ?></textarea></div>
								</div>
							  </div>

							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Metode</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:50px' class="form-control" name='f' required><?php echo $e[metode]; ?></textarea></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Latar Belakang</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:100px' class="form-control" name='g' required><?php echo $e[latar_belakang]; ?></textarea></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'></label>
								<div class="col-sm-offset col-sm-9"><hr>
								  <button type="submit" name='update' class="btn btn-success">Update</button><br><br>
								</div>
							  </div>
						</form>
					
		</article>
	</div>

</div>