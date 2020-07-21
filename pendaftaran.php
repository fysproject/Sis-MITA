<?php 
	if (isset($_POST[submit])){
		$tanggal_lahir = "$_POST[thn]-$_POST[bln]-$_POST[tgl]";
		$passs = md5($_POST[b]);
		mysql_query("INSERT INTO tbl_dosen VALUES('','$_POST[a]','$passs','$_POST[c]','$_POST[g]','$_POST[d]','$_POST[e]','$tanggal_lahir','$_POST[jk]','$_POST[f]','Non Aktif')");
		echo "<script>document.location='index.php?view=pendaftaran&status=success';</script>";
	}
?>

<div class="row">
	<div class="col-md-12">
		<article>			
		<div class="alert alert-success">
	        Form Register
	    </div>
	    <?php 
	    	if ($_GET[status]=='success'){
	    		echo "<center style='margin-top:5%'>Sukses Mendaftar Sebagai Penulis/Author Baru.
	    											<br>Akun anda Akan segera Kita proses, Jika akun sudah aktif silahkan login dari <br> Melalui Menu Login
	    											Terima kasih..</center>";
	    	}else{
	    ?>
						<form action='' method='POST' class="form-horizontal" role="form">
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Username</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5"><input type="text" class="form-control " name='a' placeholder="Masukkan Username" required></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Password</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5"><input type="password" class="form-control " name='passs' placeholder="Masukkan Password" required></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Nama Lengkap</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-8"><input type="text" class="form-control " name='c' placeholder="Nama Lengkap" required></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>E-mail</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-8"><input type="text" class="form-control " name='g' placeholder="Masukkan E-mail" required></div>
								</div>
							  </div>
							  
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Alamat</label>
								<div class="input-group col-lg-9">
								  	<div class="col-lg-12"><textarea style='width:100%; height:80px' class="form-control" id="inputPassword3" name='d' required></textarea></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								<label for='inputEmail3' class='col-sm-2 control-label'>Tempat Lahir</label>
								<div class="input-group col-lg-9">
								  	<div class="col-lg-8"><input type="text" class="form-control" id="inputPassword3" name='e' placeholder="Masukkan Tempat Lahir" required></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  		<label for='inputEmail3' class='col-sm-2 control-label'>Tanggal Lahir</label>
								<div class="col-9">
								  <?php
									// Tampilkan pilihan tanggal dari 1 s/d 31 pada ComboBox
								  echo "<div class='col-lg-3'><select name=tgl class='form-control' required><option value=0>Tanggal</option>";
									for($tgl=1; $tgl<=31; $tgl++) {
									echo "<option value=$tgl>$tgl</option>";
									}
									echo "</select></div>";

									// Tampilkan pilihan bulan dalam format Indonesia pada ComboBox
									$nama_bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									echo "<div class='col-lg-3'><select name=bln class='form-control' required>
										  <option value=0>Bulan</option>";
									for ($bln=1; $bln<=12; $bln++) {
									   echo "<option value=$bln>$nama_bln[$bln]</option>";
									}
									echo "</select></div>";
								
									// Tampilkan pilihan tahun dari 1970 s/d saat ini pada ComboBox
									$thn_sekarang=date("Y");
									echo "<div class='col-lg-2'><select name=thn class='form-control' required><option value=0>Tahun</option>";
									for($thn=1960; $thn<=$thn_sekarang;$thn++) {
									   echo "<option value=$thn>$thn</option>";
									}
									echo "</select></div>";
								  ?>
								</div>
							  </div>

							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Jenis Kelamin</label>
								<div class="col-lg-9">
										<input type="radio" name='jk' id="optionsRadios2" value="Laki-laki"> Laki-Laki 
										<input type="radio" name='jk' id="optionsRadios2" value="Perempuan"> Perempuan
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>No Telpon</label>
								<div class="input-group col-lg-7">
								  <div class="col-lg-5"><input type="number" class="form-control " name='f' placeholder="No Telpon" required></div>
								</div>
							  </div>
	
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'></label>
								<div class="col-sm-offset col-sm-9"><hr>
								  <button type="submit" name='submit' class="btn btn-success">Register</button><br><br>
								</div>
							  </div>
						</form>
			<?php } ?>
		</article>
	</div>
</div>