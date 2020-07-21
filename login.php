<?php 
if (isset($_POST[login])){
	$password = md5($_POST[b]);
	if ($_POST[level]=='dosen'){
		$query = mysql_query("SELECT * FROM tbl_dosen where unama='$_POST[a]' AND password='$password' AND akses='Aktif'");
		$hitung = mysql_num_rows($query);
		$r = mysql_fetch_array($query);
		if ($hitung >= 1){
			$_SESSION['id'] = $r['id_dosen'];
			$_SESSION['level'] = 'dosen';
			header('Location:index.php');
		}else{
			echo "<div class='alert alert-danger'><center>Maaf, Username dan Password anda Salah <br> atau Mungkin akun anda Belum di aktifkan...!!!</center></div>";
		}
	}else{
		$query = mysql_query("SELECT * FROM tbl_users where username='$_POST[a]' AND password='$password'");
		$hitung = mysql_num_rows($query);
		$r = mysql_fetch_array($query);
		if ($hitung >= 1){
			$_SESSION['id'] = $r['id_users'];
			$_SESSION['level'] = $r['level'];
			header('Location:index.php');
		}else{
			echo "<div class='alert alert-danger'><center>Maaf, Username dan Password anda Salah...!!!</center></div>";
		}
	}
}
?>
<div class="row">
	<div class="col-md-12">	
			<article>
				<div class='alert alert-success'>
					<strong>Form Login</strong>
				</div>
						<form action='' method='POST' class='form-horizontal' role='form'>
							  
							  <div class='form-group'>
							  	<label for='inputEmail3' class='col-sm-3 control-label'>Level</label>
								<div class='input-group col-lg-9'>
								  	<div class='col-xs-5'><select class='form-control' id='inputPassword3' name='level'>
								  							<option value='0' selected>Pilih</option>
								  							<option value='dosen'>Researcher</option>
								  							<option value='reviewer'>Reviewer</option>
								  							<option value='editor'>Editor</option>
								  						  </select></div>
								</div>
							  </div>

							  <div class='form-group'>
								<label for='inputEmail3' class='col-sm-3 control-label'>Username</label>
								<div class='input-group col-lg-9'>
								  	<div class='col-xs-8'><input type='text' class='form-control' id='inputPassword3' name='a' placeholder='Masukkan Username' required></div>
								</div>
							  </div>

							  <div class='form-group'>
							  	<label for='inputEmail3' class='col-sm-3 control-label'>Password</label>
								<div class='input-group col-lg-9'>
								  	<div class='col-xs-8'><input type='password' class='form-control' id='inputPassword3' name='b' placeholder='Masukkan Password' required></div>
								</div>
							  </div>
							  
							  <div class='form-group'>
							  <label for='inputEmail3' class='col-sm-3 control-label'></label>
								<div class='col-sm-offset col-sm-9'><hr>
								  <button type='submit' name='login' class='btn btn-success'>Login</button><br><br>
								</div>
							  </div>
							</form>

		  </article>
	</div>
</div>