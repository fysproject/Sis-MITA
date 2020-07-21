<?php 
	if (isset($_POST[update])){
		$tanggal_lahir = "$_POST[thn]-$_POST[bln]-$_POST[tgl]";
		$passs = md5($_POST[b]);
		if (trim($_POST[b])==''){
			mysql_query("UPDATE tbl_dosen SET nidn 		= '$_POST[a]',
											  nama 		= '$_POST[c]',
											  alamat 	= '$_POST[d]',
											  tempat_lahir 	= '$_POST[e]',
											  tanggal_lahir = '$tanggal_lahir',
											  jenis_kelamin = '$_POST[jk]',
											  no_telpon 	= '$_POST[f]',
											  id_jabatan = '$_POST[g]' where id_dosen='$_GET[id]'");
		}else{
			mysql_query("UPDATE tbl_dosen SET nidn 		= '$_POST[a]',
											  password  = '$passs';
											  nama 		= '$_POST[c]',
											  alamat 	= '$_POST[d]',
											  tempat_lahir 	= '$_POST[e]',
											  tanggal_lahir = '$tanggal_lahir',
											  jenis_kelamin = '$_POST[jk]',
											  no_telpon 	= '$_POST[f]',
											  id_jabatan = '$_POST[g]' where id_dosen='$_GET[id]'");
		}
		echo "<script>document.location='index.php?view=penulis';</script>";
	}

	$e = mysql_fetch_array(mysql_query("SELECT * FROm tbl_dosen where id_dosen='$_GET[id]'"));
	$pecah = explode('-',$e[tanggal_lahir]);
	$tahun = $pecah[0];
	$bulann = $pecah[1];
	$tanggall = $pecah[2];
	$cek = substr($bulann,0,1);
	$cekk = substr($tanggall,0,1);
		if ($cek == 0){
			$cek2 = substr($bulann,1,1);
			$bulan = $cek2;
		}else{
			$bulan = $bulann;
		}

		if ($cekk == 0){
			$cek3 = substr($tanggall,1,1);
			$tanggal = $cek3;
		}else{
			$tanggal = $tanggall;
		}
?>

<div class="row">
	<div class="col-md-12">
		<article>			
		<div class="alert alert-success">
	        Setting Account Login
	    </div>
						<form action='' method='POST' class="form-horizontal" role="form">
							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>NIDN</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5"><input type="text" class="form-control" value='<?php echo $e[nidn]; ?>' name='a' placeholder="Masukkan NIDN" required></div>
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
								  <div class="col-lg-8"><input type="text" class="form-control" value='<?php echo $e[nama]; ?>' name='c' placeholder="Nama Lengkap" required></div>
								</div>
							  </div>
							  
							  
							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Alamat</label>
								<div class="input-group col-lg-9">
								  	<div class="col-lg-12"><textarea style='width:100%; height:80px' class="form-control" id="inputPassword3" name='d' required><?php echo $e[alamat]; ?></textarea></div>
								</div>
							  </div>
							  
							  <div class="form-group">
								<label for='inputEmail3' class='col-sm-2 control-label'>Tempat Lahir</label>
								<div class="input-group col-lg-9">
								  	<div class="col-lg-8"><input type="text" class="form-control" id="inputPassword3" name='e' value='<?php echo $e[tempat_lahir]; ?>' placeholder="Masukkan Tempat Lahir" required></div>
								</div>
							  </div>
							  
							  <div class="form-group">
							  		<label for='inputEmail3' class='col-sm-2 control-label'>Tanggal Lahir</label>
								<div class="col-9">
								  <?php
									// Tampilkan pilihan tanggal dari 1 s/d 31 pada ComboBox
								  echo "<div class='col-lg-3'><select name=tgl class='form-control' required><option value=0>Tanggal</option>";
									for($tgl=1; $tgl<=31; $tgl++) {
										if ($tanggal==$tgl){
											echo "<option value=$tgl selected>$tgl</option>";
										}else{
											echo "<option value=$tgl>$tgl</option>";
										}
									}
									echo "</select></div>";

									// Tampilkan pilihan bulan dalam format Indonesia pada ComboBox
									$nama_bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
									echo "<div class='col-lg-3'><select name=bln class='form-control' required>
										  <option value=0>Bulan</option>";
									for ($bln=1; $bln<=12; $bln++) {
										if ($bulan==$bln){
											echo "<option value=$bln selected>$nama_bln[$bln]</option>";
										}else{
									   		echo "<option value=$bln>$nama_bln[$bln]</option>";
										}
									}
									echo "</select></div>";
								
									// Tampilkan pilihan tahun dari 1970 s/d saat ini pada ComboBox
									$thn_sekarang=date("Y");
									echo "<div class='col-lg-2'><select name=thn class='form-control' required><option value=0>Tahun</option>";
									for($thn=1960; $thn<=$thn_sekarang;$thn++) {
										if ($tahun==$thn){
											echo "<option value=$thn selected>$thn</option>";
										}else{
											echo "<option value=$thn>$thn</option>";
										}
									}
									echo "</select></div>";
								  ?>
								</div>
							  </div>

							  <div class="form-group">
							  	<label for='inputEmail3' class='col-sm-2 control-label'>Jenis Kelamin</label>
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
							  <label for='inputEmail3' class='col-sm-2 control-label'>No Telpon</label>
								<div class="input-group col-lg-7">
								  <div class="col-lg-5"><input type="number" class="form-control " value='<?php echo $e[no_telpon]; ?>' name='f' placeholder="No Telpon" required></div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail3' class='col-sm-2 control-label'>Jabatan Fungsional</label>
								<div class="input-group col-lg-7">
								  <div class="col-lg-7">
								  	<select class="form-control " name='g' required>
								  		<?php 
								  			$jabatan = mysql_query("SELECT * FROM tbl_jabatan");
								  			while ($j = mysql_fetch_array($jabatan)){
									  			if ($e[id_jabatan]==$j[id_jabatan]){
									  				echo "<option value='$j[id_jabatan]' selected>$j[nama_jabatan]</option>";
									  			}else{
									  				echo "<option value='$j[id_jabatan]'>$j[nama_jabatan]</option>";
									  			}
								  			}
								  		?>
								  	</select>
								  </div>
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