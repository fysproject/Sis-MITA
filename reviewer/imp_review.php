<?php 
if (isset($_GET[delete])){
	mysql_query("DELETE FROM tbl_tbl_dokrevimlap where id_dokrevimlap='$_GET[delete]'");
	echo "<script>document.location='list-implementasi.mdn';</script>";
}
?>

<?php 
if (isset($_GET[deletee])){
	mysql_query("DELETE FROM tbl_dokrevimpeda where id_dokrevimpeda='$_GET[deletee]'");
	echo "<script>document.location='list-implementasi.mdn';</script>";
}
?>

<div class="row">
	<div class="col-md-12">
		<ul id="myTabs" class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#tabrev1" id="tabrev1-tab" role="tab" data-toggle="tab" aria-controls="tabrev1" aria-expanded="true">Summary</a>
			</li>
			<li role="presentation" class="">
				<a href="#tabrev2" id="tabrev2-tab" role="tab" data-toggle="tab" aria-controls="tabrev2" aria-expanded="false">Pengolahan & Analisis Data</a>
			</li>
			<li role="presentation" class="">
				<a href="#tabrev3" id="tabrev3-tab" role="tab" data-toggle="tab" aria-controls="tabrev3" aria-expanded="false">Penyusunan Laporan</a>
			</li>
		</ul><br>

		<div id="myTabContent" class="tab-content">
			<div role="tabpanel" class="tab-pane fade active in" id="tabrev1" aria-label="entertainment">
				<table class="table table-responsive">
		      <thead>
		        <tr>
		        	<th scope="row">No</th> 
		        	<th>Judul</th>	
		        	<th>Tanggal</th>	
		        	<th>Status</th>
		        	<th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
			<?php 		
				$p      = new Paging;
				$batas  = 10;
				$posisi = $p->cariPosisi($batas);
				$no = $posisi+1;
				$journal = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen JOIN tbl_users c ON a.penilai_eksternal=c.nama_lengkap WHERE c.id_users='$_SESSION[id]' ORDER BY a.id_journal DESC LIMIT $posisi, $batas");
				while ($j = mysql_fetch_array($journal)){
					if ($j[status]=='1'){
						$status = '<span align="center" class="text-success">Published</span>';
					}else{
						$status = '<span class="text-danger">Unpublished</span>';
					}
					
					$ex = explode(' ',$j[waktu_kirim]);
					echo "<tr><td>$no</td>
							  <td><a href='detail-journal-$j[id_journal].mu'>$j[judul]</a></td>
							  <td>".tgl_indo($ex[0])."</td>
							  <td>$status</td>

							  <td width=100px>
							  	  <a href='detail-journal-$j[id_journal].mu' class='btn btn-success btn-xs'>Detail</a>";
							  echo "</td>
						  </tr>";
					$no++;
				}
					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_journal"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					if (isset($_GET[publish])){
						mysql_query("UPDATE tbl_journal SET review='$_GET[publish]' where id_journal='$_GET[journal]'");
						echo "<script>document.location='list-journal.mu';</script>";
					}
			?>
			  </tbody>
		</table>
		<nav>
			<ul class="pagination">
				<?php echo $linkHalaman ?>	
				</ul>
			</nav>
			</div>

<?php #------------------------------------------------Sesion Pengolahan Data---------------------------------------------# ?>
	<div role="tabpanel" class="tab-pane fade" id="tabrev2" aria-label="entertainment">
	<div class="text-info">
	<?php echo "<b>RESEARCHER</b></br>";?>
	<?php echo "Submission" ?>
	</div><hr>
	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Review Internal</th>
				<th>Approved</th>
			</tr>
		</thead>
		<tbody>
		<?php
			// UPLOAD PROPOSAL Researcher
			$research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_users b ON a.penilai_eksternal=b.nama_lengkap WHERE b.id_users='$_SESSION[id]' AND a.status='0' ORDER BY a.id_journal DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
				if ($r[acc]=='1'){
					$acc = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
				if ($r[acc_resolahdata]=='1'){
					$acc_resolahdata = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc_resolahdata = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}

			echo "<tr>
			<td>$r[judul]</td>
			<td>$acc</td>
			<td>$acc_resolahdata</td>
			</tr>";
			}
		?>
		</tbody>
	</table>

	<table class="table">
		<thead>
			<tr>
				<th class="text-info"><b>Subb. Files</b></th>
			</tr>
		</thead>
		<tbody>
			<?php
			//Hitori File Researcher 
			$research=mysql_query("SELECT * FROM tbl_resolahdata a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_users c ON b.penilai_eksternal=c.nama_lengkap WHERE c.id_users='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
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
			<td align=left width=500px><a href='download.php?file=$r[file_olah]'>$r[file_olah]</a></td>
			<td align=left width=100px><small style='color:black'>$tanggal $bln $tahun </small></td>
			<td width=180px>";
		}
			?>
		</tbody>
	</table><br>

	<div class=text-info>
		<?php echo"<b>REVIEWER</b>" ?> <hr>
		Review Version
	</div><br>

<table class="table">
	<div>
		<?php $research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_users b ON a.penilai_eksternal=b.nama_lengkap WHERE b.id_users='$_SESSION[id]'");
		while($r = mysql_fetch_array($research)){
			if ($r[acc]=='1' AND $r[acc_resolahdata]=='0') {
				echo "<a href='index.php?view=implementasirev&act=uploadimpeda&id=$r[id_journal]' class='text-info'>Upload</a>";
			}else{
				echo "<a href='' class='text-danger'>Upload</a>";
			}
		}
		?>
	</div>
	<tbody>
			<?php
			//Upload File Review Reviewer
			$research=mysql_query("SELECT * FROM tbl_dokrevimpeda a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_users c ON a.id_users=c.id_users  WHERE a.id_users='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "<tr>
			<td><a href='download.php?file=$r[file_revimpeda]'>$r[file_revimpeda]</a></td>
			<td width=180px>";
			if ($r[acc]=='1' AND $r[acc_resolahdata]=='0') {
				echo "<a title='Approved This Processing and Analisis Data' href='index.php?view=implementasirev&journal=$r[id_journal]&publishh=1' style='width:35px; margin-left:5px' class='text-success' onclick=\"return confirm('Are You Sure Approved this Processing and Analisis Data?')\">Approved</a>";
			}else{
				echo "<a title='Unapproved This Processing and Analisis Data' href='index.php?view=implementasirev&journal=$r[id_journal]&publishh=0' style='width:35px; margin-left:5px' class='text-danger' onclick=\"return confirm('Are You Sure Unapproved this Processing and Analisis Data?')\">Unapproved</a></td></tr>";
			}
		if (isset($_GET[publishh])){
			mysql_query("UPDATE tbl_journal SET acc_resolahdata='$_GET[publishh]' where id_journal='$_GET[journal]'");
			echo "<script>document.location='list-implementasi.mdn';</script>";
		}
			}
		?>
	</tbody>
</table><hr>

	<div class=text-info>
		Subb. Files
	</div>

	<table class="table"> 
		<tbody> 
			<?php 
			//Hitori File Reviewer
			$research=mysql_query("SELECT * FROM tbl_dokrevimpeda a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_users c ON a.id_users=        c.id_users WHERE a.id_users='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
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
			<td align=left width=500px><a href='download.php?file=$r[file_revimpeda]'>$r[file_revimpeda]</a></td>
			<td align=left width=100px><small style='color:black'>$tanggal $bln $tahun </small></td>
			<td width=180px>";
			if ($r[acc]=='1' AND $r[acc_resolahdata]=='0'){
				echo "<a href='index.php?view=listjournal&deletee=$r[id_dokrevimpeda]' class='text-info'>Delete</a></td><br></tr>";
			}else{
				echo"<a href='' class='text-warning'>Delete</a></td><br></tr>";
			}
		}
			?>
		</tbody>
	</table>
</div>

<?php#----------------------------------------------Sesion Penyusunan Laporan------------------------------------#?>
<div role="tabpanel" class="tab-pane fade" id="tabrev3" aria-label="entertainment">
	<div class=text-info>
		<?php 
		echo"<b>DOKUMEN LAPORAN</b>"
		?>
	</div><hr>
	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Approved Pengolahan dan Analisis Data</th>
				<th>Approved Penyusunan Laporan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// Menampilkan Data dari tabel dokumen dan tabel penelitian DOKUMEN PENYUSUNAN LAPORAN
			$research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_users b ON a.penilai_eksternal=b.nama_lengkap WHERE b.id_users='$_SESSION[id]' AND a.status='0' ORDER BY id_journal DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
				if ($r[acc_resolahdata]=='1'){
					$acc_resolahdata = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc_resolahdata = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
				if ($r[acc_reslap]=='1'){
					$acc_reslap = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc_reslap = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
			echo "<tr>
			<td>$r[judul]</td>
			<td>$acc_resolahdata</td>
			<td>$acc_reslap</td>
			</tr>"; 
		}
			?>
		</tbody>
	</table>

	<div class=text-info>
		Supp. files
	</div>
	<table class="table">
		<tbody>
			<?php
			//Hitori File Researcher 
			$research=mysql_query("SELECT * FROM tbl_reslap a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_users c ON b.penilai_eksternal=c.nama_lengkap WHERE c.id_users='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
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
			echo "<tr>
			<td align=left width=200px><a href='download.php?file=$r[file_reslap]'>$r[file_reslap]</a></td>
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>
			<td width=180px>";
		}
			?>
		</tbody>
	</table><br>

	<div class=text-info>
		<?php echo"<b>REVIEWER</b>" ?> <hr>
		Review Version
	</div></br>

	<table class="table">
		<div>
		<?php $research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_users b ON a.penilai_eksternal=b.nama_lengkap WHERE b.id_users='$_SESSION[id]'");
		while($r = mysql_fetch_array($research)){
			if ($r[acc_resolahdata]=='1' AND $r[acc_reslap]=='0') {
				echo "<a href='index.php?view=implementasirev&act=uploadimlap&id=$r[id_journal]' class='text-info'>Upload</a>";
			}else{
				echo "<a href='' class='text-danger'>Upload</a>";
			}
		}
		?>
		</div>
		<tbody>
		<?php
		//File Review Instrument Peer Reviewer
		$research=mysql_query("SELECT * FROM tbl_dokrevimlap a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE a.id_users='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
		while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td width=500px><a href='download.php?file=$r[file_revimlap]'>$r[file_revimlap]</a></td>
			<td width=180px>";
			if ($r[acc_resolahdata]=='1' AND $r[acc_reslap]=='0') {
				echo "<a title='Approved This Instrument' href='index.php?view=implementasirev&journal=$r[id_journal]&publishhh=1' style='width:35px; margin-left:5px' class='text-success' onclick=\"return confirm('Are You Sure Approved this Instrument?')\">Approved</a></td>";
			}else{
				echo "<a title='Unapproved This Instrument' href='index.php?view=implementasirev&journal=$r[id_journal]&publishhh=0' style='width:35px; margin-left:5px' class='text-danger' onclick=\"return confirm('Are You Sure Unapproved this Instrument?')\">Unapproved</a></td></tr>";
			}
			if (isset($_GET[publishhh])){
			mysql_query("UPDATE tbl_journal SET acc_reslap='$_GET[publishhh]' where id_journal='$_GET[journal]'");
			echo "<script>document.location='list-implementasi.mdn';</script>";
			}
		}
		?>
		</tbody>
	</table><hr>

	<div class=text-info>
		Subb. Files
	</div>

	<table class="table">
		<tbody>
			<?php
			//Hitori File Instrument Peer Reviewer
			$research=mysql_query("SELECT * FROM tbl_dokrevimlap a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE a.id_users='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
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
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>";
		}
			?>
		</tbody>
	</table>
</div>



		</div>				
	</div>
</div>