<?php 
if (isset($_GET[delete])){
	mysql_query("DELETE FROM tbl_journal where id_journal='$_GET[delete]'");
	echo "<script>document.location='implementasi.mdn';</script>";
}
?>
<?php
if(isset($_GET[deletee])){
	mysql_query("DELETE FROM tbl_dokumen where id_dokumen='$_GET[deletee]'");
	echo "<script>document.location='implementasi.mdn';</script>";
} ?>

<?php
if(isset($_GET[delete_ins])){
	mysql_query("DELETE FROM tbl_ins_research where id_instrument='$_GET[delete_ins]'");
	echo "<script>document.location='implementasi.mdn';</script>";
} ?>

<?php
if(isset($_GET[delete_insrev])){
	mysql_query("DELETE FROM tbl_ins_review where id_insrev='$_GET[delete_insrev]'");
	echo "<script>document.location='implementasi.mdn';</script>";
} ?>

<?php
if(isset($_GET[delete_olah])){
	mysql_query("DELETE FROM tbl_resolahdata where id_resolah='$_GET[delete_olah]'");
	echo "<script>document.location='implementasi.mdn';</script>";
} ?>

<?php
if(isset($_GET[delete_peda])){
	mysql_query("DELETE FROM tbl_dokpeda where id_dokpeda='$_GET[delete_peda]'");
	echo "<script>document.location='implementasi.mdn';</script>";
} ?>

<?php
if(isset($_GET[delete_reslap])){
	mysql_query("DELETE FROM tbl_reslap where id_reslap='$_GET[delete_reslap]'");
	echo "<script>document.location='implementasi.mdn';</script>";
} ?>

<?php
if(isset($_GET[delete_reseminar])){
	mysql_query("DELETE FROM tbl_dokreseminar where id_dokreseminar='$_GET[delete_reseminar]'");
	echo "<script>document.location='implementasi.mdn';</script>";
} ?>

<div class="row">
	<div class="col-md-12">
		<ul id="myTabs" class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#tab1" id="tab1-tab" role="tab" data-toggle="tab" aria-controls="tab1" aria-expanded="true">Pengumpulan Data</a>
			</li>
			<li role="presentation" class="">
				<a href="#tab2" id="tab2-tab" role="tab" data-toggle="tab" aria-controls="tab2" aria-expanded="false">Pengolahan dan Analisis Data</a>
			</li>
			<li role="presentation" class="">
				<a href="#tab3" id="tab3-tab" role="tab" data-toggle="tab" aria-controls="tab3" aria-expanded="false">Penyusunan Laporan</a>
			</li>
			<li role="presentation" class="">
				<a href="#tab4" id="tab4-tab" role="tab" data-toggle="tab" aria-controls="tab4" aria-expanded="false">Seminar Hasil</a>
			</li>
		</ul><br>
<? #--------------------------------------------------Session Pengumpulan Data-------------------------------#?>
	   <div id="myTabContent" class="tab-content">
	   <div role="tabpanel" class="tab-pane fade active in" id="tab1" aria-label="entertainment">
	    <table class="table table-responsive">
	    <?php
	   	//menambah dokumen laporan
	   	$research = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND  a.status='0' ORDER BY id_journal DESC LIMIT 1");
				while ($r = mysql_fetch_array($research)){
					echo"<a title='Upload Pengumpulan Data' href='index.php?view=implementasi&act=tambah_imp&id=$r[id_journal]' class='btn btn-info btn-xs'><i class='glyphicon glyphicon-plus'>Tambah</i></a>";
				}
		?>
		      <thead>
		        <tr>
		        	<th>Judul</th>	
		        	<th>File</th>
		        	<th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
			<?php 	
				$research = mysql_query("SELECT * FROM tbl_dokpeda a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON a.id_dosen=c.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND  b.status='0' ORDER BY a.waktu DESC LIMIT 1");
				while ($r = mysql_fetch_array($research)){
					echo "<tr>
							  <td>$r[judul]</td>
							  <td>$r[file_peda]</td>
							  <td width='100px'>";
							  if ($r[acc]=='1') {
							  	echo "<a title='Edit' href='index.php?view=implementasi&act=editimp&id=$r[id_journal]' class='btn btn-info btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
							  	 <a title='Delete' href='index.php?view=implementasi&delete_peda=$r[id_dokpeda]' class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td></tr>";
							  }else{
							  	echo "<a title='Edit' href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
							  	 <a title='Delete' href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-trash'></i></a></tr>";
							  }
				}
			?>
			  </tbody>
		</table>
	</div>

<?#--------------------------------------------------Session Pengolahan Data---------------------------------------------------#?>

<div role="tabpanel" class="tab-pane fade" id="tab2" aria-label="entertainment">
	<div class="text-info">
	<?php echo "<b>RESEARCHER</b>" ?><hr>
	<?php echo "Submission" ?>
	</div><hr>
	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Approve Reviewer Eksternal</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// UPLOAD Analisis Data dan Pengolahan Data
			$research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND a.status='0' ORDER BY id_journal");
			while($r = mysql_fetch_array($research)){
				if ($r[acc_resolahdata]=='1'){
					$acc_resolahdata = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc_resolahdata = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
			echo "
			<tr>
			<td>$r[judul]</td>
			<td>$acc_resolahdata</td>
			<td width=160px>";
			if ($r[acc]=='1' AND $r[acc_resolahdata]=='0'){
				echo "<a href='index.php?view=implementasi&act=uploadlah&id=$r[id_journal]' class='btn btn-success btn-xs'><i class='glyphicon glyphicon-upload'> Upload</i></a></td></tr>";
			}else{
				echo"
				<a href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-upload'>Upload</i></a></tr>";
			} 
		}
			?>
		</tbody>
	</table> <br>

	<div class="text-info">
		Review Version
	</div><hr>

	<tbody>
			<?php
			//File Review Researcher
			$research=mysql_query("SELECT * FROM tbl_resolahdata a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE b.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[file_olah]'>$r[file_olah]</a></td>
			</tr>";
			if ($r[acc]=='1' AND $r[acc_resolahdata]=='0'){
				echo "<a href='index.php?view=implementasi&act=upload&id=$r[id_resolah]' class='text-info'></a></td>";
			}else{
				echo"
				<a href='' class='text-warning'></a>";
			}
		}
			?>
	</tbody><hr>

	<div class=text-info>
		Supp. files
	</div>
	<table class="table">
		<tbody>
			<?php
			//Hitori File Researcher 
			$research=mysql_query("SELECT * FROM tbl_resolahdata a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE b.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
			while($r = mysql_fetch_array($research)){
				$tahun = substr($r[waktu], 0,4);
				$bulan = substr($r[waktu], 5,2);
				$tanggal = substr($r[waktu], 8,2);
				if ($cek == 0){
					$cek2 = substr($bulan,1,1);
					$bulanc = $cek2;
				}else{
					$bulanc = $bulan;
				}
				$bln = $a[$bulanc];
			echo "
			<tr>
			<td align=left width=200px><a href='download.php?file=$r[file_olah]'>$r[file_olah]</a></td>
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>
			<td width=180px>";
			if ($r[acc]=='1' AND $r[acc_resolahdata]=='0'){
				echo "<a href='index.php?view=implementasi&delete_olah=$r[id_resolah]' class='text-info'>Delete</a></td><br></tr>";
			}else{
				echo"<a href='' class='text-warning'> Delete</a></td><br></tr>";
			}
		}
			?>
		</tbody>
	</table><br>

	<? #---------------------------------Session Reviewer Pengolahan Data------------------------------------------#?>

	<div class=text-info>
		<?php echo"<b>REVIEWER</b>" ?> <hr>
		Review Version
	</div>

	<tbody>
			<?php
			//File Review Reviewer
			$research=mysql_query("SELECT * FROM tbl_dokrevimpeda a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON b.id_dosen=c.id_dosen WHERE c.id_dosen=$_SESSION[id] AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[file_revimpeda]'>$r[file_revimpeda]</a></td>
			</tr>";
		}
			?>
	</tbody><hr>

	<div class=text-info>
		Subb. Files
	</div>

	<table class="table">
		<tbody>
			<?php
			//Hitori File Reviewer
			$research=mysql_query("SELECT * FROM tbl_dokrevimpeda a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON b.id_dosen=c.id_dosen WHERE c.id_dosen=$_SESSION[id] AND b.status='0' ORDER BY a.waktu");
			while($r = mysql_fetch_array($research)){
				$tahun = substr($r[waktu], 0,4);
				$bulan = substr($r[waktu], 5,2);
				$tanggal = substr($r[waktu], 8,2);
				if ($cek == 0){
					$cek2 = substr($bulan,1,1);
					$bulanc = $cek2;
				}else{
					$bulanc = $bulan;
				}
				$bln = $a[$bulanc];
			echo "
			<tr>
			<td align=left width=200px><a href='download.php?file=$r[file_revimpeda]'>$r[file_revimpeda]</a></td>
			<td align=left width=330px><small style='color:black'>$tanggal $bln $tahun </small></td>";
		}
			?>
		</tbody>
	</table>
</div>

<? #---------------------------------Session Researcher Penyusunan Laporan------------------------------------------#?>

<div role="tabpanel" class="tab-pane fade" id="tab3" aria-label="entertainment">
	<div class="text-info">
	<?php echo "<b>RESEARCHER</b>" ?><hr>
	<?php echo "Submission" ?>
	</div><hr>
	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Approve Reviewer Eksternal</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// UPLOAD DOKUMEN PENYUSUNAN LAPORAN
			$research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND a.status='0' ORDER BY id_journal");
			while($r = mysql_fetch_array($research)){
				if ($r[acc_reslap]=='1'){
					$acc_reslap = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc_reslap = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
			echo "
			<tr>
			<td>$r[judul]</td>
			<td>$acc_reslap</td>
			<td width=160px>";
			if ($r[acc_resolahdata]=='1' AND $r[acc_reslap]=='0'){
				echo "<a href='index.php?view=implementasi&act=uploadreslap&id=$r[id_journal]' class='btn btn-success btn-xs'><i class='glyphicon glyphicon-upload'> Upload</i></a></td></tr>";
			}else{
				echo"
				<a href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-upload'>Upload</i></a></tr>";
			} 
		}
			?>
		</tbody>
	</table> <br>

	<div class="text-info">
		Review Version
	</div><hr>

	<tbody>
			<?php
			//File Review Researcher
			$research=mysql_query("SELECT * FROM tbl_reslap a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE b.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[file_reslap]'>$r[file_reslap]</a></td>
			</tr>";
			if ($r[acc_resolahdata]=='1' AND $r[acc_reslap]=='0'){
				echo "<a href='index.php?view=implementasi&act=uploadreslap&id=$r[id_journal]' class='text-info'></a></td>";
			}else{
				echo"
				<a href='' class='text-warning'></a>";
			}
		}
			?>
	</tbody><hr>

	<div class=text-info>
		Supp. files
	</div>
	<table class="table">
		<tbody>
			<?php
			//Hitori File Researcher 
			$research=mysql_query("SELECT * FROM tbl_reslap a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE b.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
			while($r = mysql_fetch_array($research)){
				$tahun = substr($r[waktu], 0,4);
				$bulan = substr($r[waktu], 5,2);
				$tanggal = substr($r[waktu], 8,2);
				if ($cek == 0){
					$cek2 = substr($bulan,1,1);
					$bulanc = $cek2;
				}else{
					$bulanc = $bulan;
				}
				$bln = $a[$bulanc];
			echo "
			<tr>
			<td align=left width=200px><a href='download.php?file=$r[file_reslap]'>$r[file_reslap]</a></td>
			<td align=left width=100px><small style='color:black'>$tanggal $bln $tahun </small></td>
			<td width=180px>";
			if ($r[acc_resolahdata]=='1' AND $r[acc_reslap]=='0'){
				echo "<a href='index.php?view=implementasi&delete_reslap=$r[id_reslap]' class='text-info'>Delete</a></td><br></tr>";
			}else{
				echo"<a href='' class='text-warning'> Delete</a></td><br></tr>";
			}
		}
			?>
		</tbody>
	</table><br>

	<? #---------------------------------Session Reviewer Penyusunan Laporan------------------------------------------#?>

	<div class=text-info>
		<?php echo"<b>REVIEWER</b>" ?> <hr>
		Review Version
	</div>

	<tbody>
			<?php
			//File Review Reviewer
			$research=mysql_query("SELECT * FROM tbl_dokrevimlap a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON b.id_dosen=c.id_dosen WHERE c.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td align=left width=150px><a href='download.php?file=$r[file_revimlap]'>$r[file_revimlap]</a></td>
			</tr>";
		}
			?>
	</tbody><hr>

	<div class=text-info>
		Subb. Files
	</div>

	<table class="table">
		<tbody>
			<?php
			//Hitori File Reviewer
			$research=mysql_query("SELECT * FROM tbl_dokrevimlap a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON b.id_dosen=c.id_dosen WHERE c.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
			while($r = mysql_fetch_array($research)){
				$tahun = substr($r[waktu], 0,4);
				$bulan = substr($r[waktu], 5,2);
				$tanggal = substr($r[waktu], 8,2);
				if ($cek == 0){
					$cek2 = substr($bulan,1,1);
					$bulanc = $cek2;
				}else{
					$bulanc = $bulan;
				}
				$bln = $a[$bulanc];
			echo "
			<tr>
			<td align=left width=200px><a href='download.php?file=$r[file_revimlap]'>$r[file_revimlap]</a></td>
			<td align=left width=280px><small style='color:black'>$tanggal $bln $tahun </small></td>";
		}
			?>
		</tbody>
	</table>
</div>

<? #---------------------------------Session Researcher Seminar Hasil------------------------------------------#?>

<div role="tabpanel" class="tab-pane fade" id="tab4" aria-label="entertainment">
	<div class="text-info">
	<?php echo "<b>RESEARCHER</b>" ?><hr>
	<?php echo "Submission" ?>
	</div><hr>
	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Approve Reviewer Eksternal</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// UPLOAD Dokumen Seminar
			$research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND a.status='0' ORDER BY id_journal");
			while($r = mysql_fetch_array($research)){
				if ($r[acc_reseminar]=='1'){
					$acc_reseminarr = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc_reseminarr = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
				if ($r[acc_reseminar]=='1'){
					$acc_reseminar = '<span class="text-info">Go to Seminar</span>';
				}else{
					$acc_reseminar = '<span class="text-warning">Proses to Seminar</span>';
				}
			echo "
			<tr>
			<td>$r[judul]</td>
			<td>$acc_reseminarr</td>
			<td>$acc_reseminar</td>
			<td width=160px>";
			if ($r[acc_reslap]=='1' AND $r[acc_reseminar]=='0'){
				echo "<a href='index.php?view=implementasi&act=uploadreseminar&id=$r[id_journal]' class='btn btn-success btn-xs'><i class='glyphicon glyphicon-upload'> Upload</i></a></td></tr>";
			}else{
				echo"
				<a href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-upload'>Upload</i></a></tr>";
			} 
		}
			?>
		</tbody>
	</table> <br>

	<div class="text-info">
		Review Version
	</div><hr>

	<tbody>
			<?php
			//File Review Researcher
			$research=mysql_query("SELECT * FROM tbl_dokreseminar a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE b.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[file_dokreseminar]'>$r[file_dokreseminar]</a></td>
			</tr>";
			if ($r[acc_reslap]=='1' AND $r[acc_reseminar]=='0'){
				echo "<a href='index.php?view=implementasi&act=uploadreslap&id=$r[id_journal]' class='text-info'></a></td>";
			}else{
				echo"
				<a href='' class='text-warning'></a>";
			}
		}
			?>
	</tbody><hr>

	<div class=text-info>
		Supp. files
	</div>
	<table class="table">
		<tbody>
			<?php
			//Hitori File Researcher 
			$research=mysql_query("SELECT * FROM tbl_dokreseminar a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE b.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
			while($r = mysql_fetch_array($research)){
				$tahun = substr($r[waktu], 0,4);
				$bulan = substr($r[waktu], 5,2);
				$tanggal = substr($r[waktu], 8,2);
				if ($cek == 0){
					$cek2 = substr($bulan,1,1);
					$bulanc = $cek2;
				}else{
					$bulanc = $bulan;
				}
				$bln = $a[$bulanc];
			echo "
			<tr>
			<td align=left width=200px><a href='download.php?file=$r[file_dokreseminar]'>$r[file_dokreseminar]</a></td>
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>
			<td width=180px>";
			if ($r[acc_reslap]=='1' AND $r[acc_reseminar]=='0'){
				echo "<a href='index.php?view=implementasi&delete_reseminar=$r[id_dokreseminar]' class='text-info'>Delete</a></td><br></tr>";
			}else{
				echo"<a href='' class='text-warning'> Delete</a></td><br></tr>";
			}
		}
			?>
		</tbody>
	</table><br>

</div> 
</div>	
</div>
</div>
