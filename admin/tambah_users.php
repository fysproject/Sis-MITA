<?php 
	if (isset($_POST[simpan])){
		$passs = md5($_POST[b]);
			mysql_query("INSERT INTO tbl_users VALUES('','$_POST[a]','$passs','$_POST[c]','$_POST[g]','$_POST[d]','$_POST[jk]','$_POST[e]','$_GET[status]')");
		echo "<script>document.location='index.php?view=users&status=".$_GET[status]."';</script>";
	}
?>

<div class="row">
	<div class="col-md-12">
		<article>			
		<div class="alert alert-success">
	        Tambah User (<?php echo $_GET[status];  ?>)
	    </div>
						<form action='' method='POST' class="form-horizontal" role="form">
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'>Username</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5"><input type="text" class="form-control" name='a' placeholder="Masukkan Username" required></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'>Password</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-6"><input type="password" class="form-control " name='passs' placeholder="Input Password" required></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'>Nama Lengkap</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-8"><input type="text" class="form-control"  name='c' placeholder="Masukkkan Nama Lengkap" required></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'>E-mail</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-8"><input type="text" class="form-control"  name='g' placeholder="Masukkan E-Mail" required></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'>No Telpon</label>
								<div class="input-group col-lg-7">
								  <div class="col-lg-5"><input type="number" class="form-control " name='d' placeholder="No Telpon" required></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-3 control-label'>Jenis Kelamin</label>
								<div class="col-lg-9">
									<input type="radio" name='jk' id="optionsRadios2" value="Laki-laki"> Laki-Laki 
									<input type="radio" name='jk' id="optionsRadios2" value="Perempuan"> Perempuan
								</div>
							  </div>

							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-3 control-label'>Alamat</label>
								<div class="input-group col-lg-9">
								  	<div class="col-lg-12"><textarea style='width:100%; height:80px' class="form-control" id="inputPassword3" name='e' required></textarea></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-3 control-label'></label>
								<div class="col-sm-offset col-sm-9"><hr>
								  <button type="submit" name='simpan' class="btn btn-success">Submit</button><br><br>
								</div>
							  </div>
						</form>
		</article>
	</div>
</div>