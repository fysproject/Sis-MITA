<?php 
	if (isset($_POST[update])){
		$passs = md5($_POST[b]);
		if (trim($_POST[b])!=''){
			mysql_query("UPDATE tbl_admin SET username 		= '$_POST[a]',
											  password 		= '$passs',
											  nama_lengkap 	= '$_POST[c]',
											  alamat 	 	= '$_POST[d]' where id_admin='$_SESSION[id]'");
		}else{
			mysql_query("UPDATE tbl_admin SET username 		= '$_POST[a]',
											  nama_lengkap 	= '$_POST[c]',
											  alamat 	 	= '$_POST[d]' where id_admin='$_SESSION[id]'");
		}
		echo "<script>document.location='index.php?view=editprofile';</script>";
	}

	$e = mysql_fetch_array(mysql_query("SELECT * FROM tbl_admin where id_admin='$_SESSION[id]'"));
?>

<div class="row">
	<div class="col-md-12">
		<article>			
		<div class="alert alert-success">
	        Setting Account Login
	    </div>
						<form action='' method='POST' class="form-horizontal" role="form">
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Username</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5"><input type="text" class="form-control" value='<?php echo $e[username]; ?>' name='a' placeholder="Masukkan NIDN" required></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Ganti Password</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-6"><input type="password" class="form-control " name='b' placeholder="Kosongkan Jika Tidak Diganti"></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Nama Lengkap</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-8"><input type="text" class="form-control" value='<?php echo $e[nama_lengkap]; ?>' name='c' placeholder="Nama Lengkap" required></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Alamat</label>
								<div class="input-group col-lg-9">
								  	<div class="col-lg-12"><textarea style='width:100%; height:80px' class="form-control" id="inputPassword3" name='d' required><?php echo $e[alamat]; ?></textarea></div>
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