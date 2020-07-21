<?php 
	if (isset($_POST[submit])){
		$sekarangi = date("Y-m-d H:i:s");
		$dir_gambar = 'asset/files/';
		$filename = basename($_FILES['d']['name']);
		$filenamee = date("Ymd").'-'.basename($_FILES['d']['name']);
		$uploadfile = $dir_gambar . $filenamee;

		if ($filename != ''){
			if (move_uploaded_file($_FILES['d']['tmp_name'], $uploadfile)) {
				mysql_query("INSERT INTO tbl_journal VALUES('','$_SESSION[id]','','','','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[e]','$_POST[f]',  '','0','0','0','0','0','0','0','','$sekarangi')");
			}
		}else{
				mysql_query("INSERT INTO tbl_journal VALUES('','$_SESSION[id]','','','','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[e]','$_POST[f]',  '','0','0','0','0','0','0','0','','$sekarangi')");
		}
		echo "<script>document.location='my-journal.mu';</script>";
	}
?>
<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
		<?php 
				echo "Tambahkan Penelitian";
		?>
	    </div>
	    <form action='' method='POST' class="form-horizontal" role="form" enctype='multipart/form-data'>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Judul</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-12"><input type="text" class="form-control" name='a' placeholder="Judul Penelitian" required></div>
								</div>
							  </div>
							  
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Rumusan Masalah</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:50px' class="form-control" name='b' placeholder="Masukkan Rumusan Masalah" required></textarea></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Tujuan Penelitian</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:50px' class="form-control" name='c' placeholder="Masukkan Tujuan Penelitian" required></textarea></div>
								</div>
							  </div>

							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Metode</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:50px' class="form-control" name='e' placeholder="Masukkan Metode" required></textarea></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Latar Belakang</label>
								<div class="input-group col-lg-10">
								  	<div class="col-lg-12"><textarea style='width:100%; height:100px' class="form-control" name='f' placeholder="Masukkan Latar Belakang" required></textarea></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'></label>
								<div class="col-sm-offset col-sm-9"><hr>
								  <button type="submit" name='submit' class="btn btn-success">Submit</button><br><br>
								</div>
							  </div>
						</form>
					
		</article>
	</div>
</div>