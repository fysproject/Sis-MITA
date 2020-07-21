<?php 
	if (isset($_POST[update])){
		$dir_gambar = 'asset/files/';
		$filename = basename($_FILES['d']['name']);
		$filenamee = date("Ymd").'-'.basename($_FILES['d']['name']);
		$uploadfile = $dir_gambar . $filenamee;

		if ($filename != ''){
			if (move_uploaded_file($_FILES['d']['tmp_name'], $uploadfile)) {
				mysql_query("UPDATE tbl_journal SET id_kategori = 	'$_POST[a]',
													judul 		= 	'$_POST[b]',
													abstrak 	= 	'$_POST[c]',
													file 		= 	'$filenamee' where id_journal='$_POST[id]'");
			}
		}else{
				mysql_query("UPDATE tbl_journal SET id_kategori = 	'$_POST[a]',
													judul 		= 	'$_POST[b]',
													abstrak 	= 	'$_POST[c]' where id_journal='$_POST[id]'");
		}
		echo "<script>document.location='my-journal.mu';</script>";
	}
	$e = mysql_fetch_array(mysql_query("SELECT * FROM tbl_journal where id_journal='$_GET[id]'"));
?>
<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
		<?php 
				echo "Edit Journal '";
		?>
	    </div>
	    <form action='' method='POST' class="form-horizontal" role="form" enctype='multipart/form-data'>
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Kategori</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5">
								  	<input type="hidden" value='<?php echo $e[id_journal]; ?>' name='id'>
								  	<select class="form-control " name='a'>
								  		<option value='0'>- Pilih -</option>
								  			<?php 
								  				$kategori = mysql_query("SELECT * FROM tbl_kategori");
								  				while ($k = mysql_fetch_array($kategori)){
								  					if ($e[id_kategori]==$k[id_kategori]){
								  						echo "<option value='$k[id_kategori]' selected>$k[nama_kategori]</option>";
								  					}else{
								  						echo "<option value='$k[id_kategori]'>$k[nama_kategori]</option>";
								  					}
								  				}
								  			?>
								  	</select>
								  </div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Judul</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-12"><input type="text" class="form-control " value='<?php echo $e[judul]; ?>' name='b' placeholder="Judul Journal..." required></div>
								</div>
							  </div>
							  
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Abstrak</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:200px' class="form-control" name='c' required><?php echo $e[abstrak]; ?></textarea></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								<label for='inputEmail3' class='col-sm-2 control-label'>Ganti File</label>
								<div class="input-group col-lg-9">
								  	<div class="col-lg-7"><input type="file" class="form-control" name='d'></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'></label>
								<div class="col-sm-offset col-sm-9"><hr>
								  <button type="submit" name='update' class="btn btn-success">Update</button>
								  <br><br>
								</div>
							  </div>
						</form>
					
		</article>
	</div>
</div>