<?php 
	if (isset($_POST[update])){
		mysql_query("UPDATE tbl_journal SET penilai_eksternal = '$_POST[a]',
											penilai_internal  = '$_POST[b]'
											WHERE id_journal='$_GET[id]'");
		echo "<script>document.location='index.php?view=journaladmin';</script>";
	}
	$e = mysql_fetch_array(mysql_query("SELECT * FROM tbl_journal a JOIN tbl_users b ON a.penilai_eksternal=b.id_users WHERE id_journal='$_GET[id]'"));
?>
<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
		<?php 
				echo "Pilih Penilai";
		?>
	    </div>
	    <form action='' method='POST' class="form-horizontal" role="form" enctype='multipart/form-data'>
							  <div class="form-group">
							  <label for='inputEmail9' class='col-sm-2 control-label'>Penilai Eksternal</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5">
								  	<input type="hidden" value='<?php echo $e[id_journal]; ?>' name='id'>
								  	<select class="form-control " name='a'>
								  		<option value='0'>Pilih</option>
								  			<?php 
								  				$penilai_eksternal = mysql_query("SELECT * FROM tbl_users WHERE level='reviewer'");
								  				while ($pe = mysql_fetch_array($penilai_eksternal)){
								  					if ($e[penilai_eksternal]==$pe[id_users]){
								  						echo "<option value='$pe[nama_lengkap]' selected>$pe[nama_lengkap]</option>";
								  					}else{
								  						echo "<option value='$pe[nama_lengkap]'>$pe[nama_lengkap]</option>";
								  					}
								  				}
								  			?>
								  	</select>
								  </div>
								</div>
							  </div>

							  <div class="form-group">
							  <label for='inputEmail9' class='col-sm-2 control-label'>Penilai Internal</label>
								<div class="input-group col-lg-9">
								  <div class="col-lg-5">
								  	<input type="hidden" value='<?php echo $e[id_journal]; ?>' name='id'>
								  	<select class="form-control " name='b'>
								  		<option value='0'>Pilih</option>
								  			<?php 
								  				$penilai_internal = mysql_query("SELECT * FROM tbl_users WHERE level='editor'");
								  				while ($pi = mysql_fetch_array($penilai_internal)){
								  					if ($e[penilai_internal]==$pi[id_users]){
								  						echo "<option value='$pi[nama_lengkap]' selected>$pi[nama_lengkap]</option>";
								  					}else{
								  						echo "<option value='$pi[nama_lengkap]'>$pi[nama_lengkap]</option>";
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
								  <button type="submit" name='update' class="btn btn-success">Submit</button><br><br>
								</div>
							  </div>
						</form>
					
		</article>
	</div>
</div>