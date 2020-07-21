<?php 
	if (isset($_POST[update])){
		$tanggal_lahir = "$_POST[thn]-$_POST[bln]-$_POST[tgl]";
		$passs = md5($_POST[b]);
		if (trim($_POST[b])==''){
			mysql_query("UPDATE tbl_users SET username 			= '$_POST[a]',
											  nama_lengkap 		= '$_POST[c]',
											  no_telpon 		= '$_POST[d]',
											  jenis_kelamin 	= '$_POST[jk]',
											  alamat_lengkap 	= '$_POST[e]' where id_users='$_SESSION[id]'");
		}else{
			mysql_query("UPDATE tbl_users SET username 			= '$_POST[a]',
											  password 			= '$passs',
											  nama_lengkap 		= '$_POST[c]',
											  no_telpon 		= '$_POST[d]',
											  jenis_kelamin 	= '$_POST[jk]',
											  alamat_lengkap 	= '$_POST[e]' where id_users='$_SESSION[id]'");
		}
		echo "<script>document.location='account.mu';</script>";
	}

	$e = mysql_fetch_array(mysql_query("SELECT * FROm tbl_users where id_users='$_SESSION[id]'"));
?>

<div class="row">
	<div class="col-md-12">
		<article>			
		<div class="alert alert-success">
	        Setting Account Login
	    </div>
						<form action='' method='POST' class="form-horizontal" role="form">
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'>Username</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5"><input type="text" class="form-control" value='<?php echo $e[username]; ?>' name='a' placeholder="Masukkan NIDN" required></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'>Ganti Password</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-6"><input type="password" class="form-control " name='b' placeholder="Kosongkan Jika Tidak Diganti"></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'>Nama Lengkap</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-8"><input type="text" class="form-control" value='<?php echo $e[nama_lengkap]; ?>' name='c' placeholder="Nama Lengkap" required></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'>No Telpon</label>
								<div class="input-group col-lg-7">
								  <div class="col-lg-5"><input type="number" class="form-control " value='<?php echo $e[no_telpon]; ?>' name='d' placeholder="No Telpon" required></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-3 control-label'>Jenis Kelamin</label>
								<div class="col-lg-9">
								<?php if ($e[jenis_kelamin]=='Laki-laki'){ ?>
									<input type="radio" name='jk' id="optionsRadios2" value="Laki-laki" checked> Laki-Laki 
									<input type="radio" name='jk' id="optionsRadios2" value="Perempuan"> Perempuan
								<?php }else{ ?>
									<input type="radio" name='jk' id="optionsRadios2" value="Laki-laki"> Laki-Laki 
									<input type="radio" name='jk' id="optionsRadios2" value="Perempuan" checked> Perempuan
								<?php } ?>
								</div>
							  </div>

							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-3 control-label'>Alamat</label>
								<div class="input-group col-lg-9">
								  	<div class="col-lg-12"><textarea style='width:100%; height:80px' class="form-control" id="inputPassword3" name='e' required><?php echo $e[alamat_lengkap]; ?></textarea></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'></label>
								<div class="col-sm-offset col-sm-9"><hr>
								  <button type="submit" name='update' class="btn btn-success">Update</button><br><br>
								</div>
							  </div>
						</form>
		</article>
	</div>

</div>