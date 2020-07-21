<?php 
if (isset($_GET[delete])){
	mysql_query("DELETE FROM tbl_journal where id_journal='$_GET[delete]'");
	echo "<script>document.location='my-journal.mu';</script>";
}
?>
<?php
if(isset($_GET[deletee])){
	mysql_query("DELETE FROM tbl_dokumen where id_dokumen='$_GET[deletee]'");
	echo "<script>document.location='my-journal.mu';</script>";
} ?>

<?php
if(isset($_GET[delete_ins])){
	mysql_query("DELETE FROM tbl_dokins where id_instrument='$_GET[delete_ins]'");
	echo "<script>document.location='my-journal.mu';</script>";
} ?>

<?php
if(isset($_GET[delete_insrev])){
	mysql_query("DELETE FROM tbl_ins_review where id_insrev='$_GET[delete_insrev]'");
	echo "<script>document.location='my-journal.mu';</script>";
} ?>

<?php
if(isset($_GET[delete_pro])){
	mysql_query("DELETE FROM tbl_dokrespro where id_dokpro='$_GET[delete_pro]'");
	echo "<script>document.location='my-journal.mu';</script>";
} ?>

<div class="row">
	<div class="col-md-12">
		<ul id="myTabs" class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#tab1" id="tab1-tab" role="tab" data-toggle="tab" aria-controls="tab1" aria-expanded="true">Summary</a>
			</li>
			<li role="presentation" class="">
				<a href="#tab2" id="tab2-tab" role="tab" data-toggle="tab" aria-controls="tab2" aria-expanded="false">Title&TOR</a>
			</li>
			<li role="presentation" class="">
				<a href="#tab3" id="tab3-tab" role="tab" data-toggle="tab" aria-controls="tab3" aria-expanded="false">Proposal</a>
			</li>
			<li role="presentation" class="">
				<a href="#tab4" id="tab4-tab" role="tab" data-toggle="tab" aria-controls="tab4" aria-expanded="false">Instrument</a>
			</li>
		</ul><br>

	    <div id="myTabContent" class="tab-content">
	    	<div role="tabpanel" class="tab-pane fade active in" id="tab1" aria-label="entertainment">	 
	    <table class="table table-responsive">
		      <thead> 
		        <tr>
		        	<th>No</th> 
		        	<th>Judul</th>	
		        	<th>Tanggal</th>	
		        	<th>Reviewer Eksternal</th>
		        	<th>Reviewer Internal</th>
		        	<th>Status</th>
		        	<th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
			<?php
				// Menampilkan Summary Report 	
				$p      = new Paging;
				$batas  = 10;
				$posisi = $p->cariPosisi($batas);
				$no = $posisi+1;
					$research = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen where a.id_dosen='$_SESSION[id]' ORDER BY a.id_journal DESC LIMIT $posisi, $batas");
				while ($r = mysql_fetch_array($research)){
					if ($r[status]=='1'){
						$status = '<span class="text-success">Published</span>';
					}else{
						$status = '<span class="text-danger">Unpublished</span>';
					}

					if ($r[review]=='1'){
						$review = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
					}else{
						$review = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
					}

					if ($r[editor]=='1'){
						$editor = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
					}else{
						$editor = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
					}

					$ex = explode(' ',$r[waktu_kirim]);

					echo "<tr><td>$no</td>
							  <td><a href='detail-journal-$r[id_journal].mu'>$r[judul]</a></td>
							  <td>".tgl_indo($ex[0])."</td>
							  <td>$review</td>
							  <td>$editor</td>
							  <td>$status</td>
							  <td>
							  	  <a href='index.php?view=myjournal&act=edit&id=$r[id_journal]' class='btn btn-success btn-xs'>Edit</a>
							  	  <a href='index.php?view=myjournal&delete=$r[id_journal]' class='btn btn-danger btn-xs'>Delete</a>
							  </td>
						  </tr>";
					$no++; // next page
				}
					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_journal where id_dosen='$_SESSION[id]'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
			?>
			  </tbody>
		</table>
		<ul class="pagination">
	    	<?php echo $linkHalaman ?>
	    </ul>
			</div>
<?#--------------------------------------------------SESSION TITLE&TOR (PENELITI)-----------------------------------------------------------------#?>
<div role="tabpanel" class="tab-pane fade" id="tab2" aria-label="entertainment">
	<div class="text-info">
	<?php echo "<b>RESEARCHER</b>" ?><BR>
	<?php echo "Submission" ?>
	</div><hr>
	<a href='index.php?view=myjournal&act=tambah' class='btn btn-info'><i class='glyphicon glyphicon-plus' style='margin-bottom:2px'> Tambah Penelitian</i></a><hr>
	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Review Internal</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// UPLOAD TOR Researcher
			$research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND a.status='0' ORDER BY id_journal");
			while($r = mysql_fetch_array($research)){
				if ($r[editor]=='1'){
					$review = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$review = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
			echo "
			<tr>
			<td>$r[judul]</td>
			<td width=160px>$editor</td>
			<td width=160px>";
			if ($r[editor]=='0'){
				echo "<a href='index.php?view=myjournal&act=upload&id=$r[id_journal]' class='btn btn-success btn-xs'><i class='glyphicon glyphicon-upload'> Upload</i></a></td></tr>";
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
			$research=mysql_query("SELECT * FROM tbl_dokumen a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON a.id_dosen=c.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND  b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[filee]'>$r[filee]</a></td>
			</tr>";
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
			$research=mysql_query("SELECT * FROM tbl_dokumen a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON a.id_dosen=c.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
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
			<td align=left width=200px><a href='download.php?file=$r[filee]'>$r[filee]</a></td>
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>
			<td width=180px>";
			if ($r[editor]=='0'){
				echo "<a href='index.php?view=myjournal&deletee=$r[id_dokumen]' class='text-info'>Delete</a></td><br></tr>";
			}else{
				echo"<a href='' class='text-warning'> Delete</a></td><br></tr>";
			}
		}
			?>
		</tbody>
	</table><br>

	<div class=text-info>
		<?php echo"<b>REVIEWER INTERNAL</b>" ?> <hr>
		Review Version <br><br>
	</div>

	<tbody>
			<?php
			//File Review Internal
			$research=mysql_query("SELECT * FROM tbl_dokeditor a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[file_editor]'>$r[file_editor]</a></td>
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
			//Hitori File Reviewer Internal
			$research=mysql_query("SELECT * FROM tbl_dokeditor a JOIN tbl_journal b ON a.id_journal=b.id_journal WHERE b.status='0' ORDER BY a.waktu");
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
			<td align=left width=200px><a href='download.php?file=$r[file_editor]'>$r[file_editor]</a></td>
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>";
		}
			?>
		</tbody>
	</table>
</div>

<?#--------------------------------------------------SESSION PROPOSAL-----------------------------------------------------------------#?>
<div role="tabpanel" class="tab-pane fade" id="tab3" aria-label="entertainment">
	<div class="text-info">
	<?php echo "<b>RESEARCHER</b>" ?><br>
	<?php echo "Submission" ?>
	</div><br>
	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Reviewer Eksternal</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// UPLOAD PROPOSAL RESEARCHER
			$research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND a.status='0' ORDER BY id_journal");
			while($r = mysql_fetch_array($research)){
				if ($r[review]=='1'){
					$review = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$review = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
				if ($r[review]=='1'){
					$revieww = '<span class="text-success">Go To Seminar Proposal</span>';
				}else{
					$revieww = '<span class="text-danger">Proses To Seminar Proposal</span>';
				}
			echo "
			<tr>
			<td>$r[judul]</td>
			<td width=160px>$review</td>
			<td width=160px>$revieww</td>
			<td width=160px>";
			if ($r[editor]=='1' AND $r[review]=='0'){
				echo "<a href='index.php?view=myjournal&act=uploadpro&id=$r[id_journal]' class='btn btn-success btn-xs'><i class='glyphicon glyphicon-upload'> Upload</i></a></td>";
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
			$research=mysql_query("SELECT * FROM tbl_dokrespro a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON a.id_dosen=c.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND  b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[file_dokpro]'>$r[file_dokpro]</a></td>
			</tr>";
			if ($r[editor]=='1'){
				echo "<a href='index.php?view=myjournal&act=upload&id=$r[id_journal]' class='text-info'></a></td>";
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
			$research=mysql_query("SELECT * FROM tbl_dokrespro a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON a.id_dosen=c.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
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
			<td align=left width=200px><a href='download.php?file=$r[file_dokpro]'>$r[file_dokpro]</a></td>
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>
			<td width=180px>";
			if ($r[editor]=='1' AND $r[review]=='0'){
				echo "<a href='index.php?view=myjournal&delete_pro=$r[id_dokpro]' class='text-info'>Delete</a></td><br></tr>";
			}else{
				echo"<a href='' class='text-warning'> Delete</a></td><br></tr>";
			}
		}
			?>
		</tbody>
	</table><br>

	<div class=text-info>
		<?php echo"<b>REVIEWER</b>" ?> <hr>
		Review Version
	</div>

	<tbody>
			<?php
			//File Review Reviewer
			$research=mysql_query("SELECT * FROM tbl_dokrev a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON b.id_dosen=        c.id_dosen  WHERE c.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[file_review]'>$r[file_review]</a></td>
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
			$research=mysql_query("SELECT * FROM tbl_dokrev a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON b.id_dosen=        c.id_dosen WHERE c.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
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
			<td align=left width=200px><a href='download.php?file=$r[file_review]'>$r[file_review]</a></td>
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>";
		}
			?>
		</tbody>
	</table>
</div>

<?#-------------------------------------SESSION INSTRUMENT-------------------------------------------#?>

<div role="tabpanel" class="tab-pane fade" id="tab4" aria-label="entertainment">
	<div class=text-info>
		<?php
		//Pemilihan Metode Penelitian 
		echo"<b>INSTRUMENT</b>"
		?>
	</div><hr>
	<table class="table">
		<thead>
			<tr>
				<th>Title</th>
				<th>Methodology Research</th>
				<th>Reviewer Eksternal</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			// Menampilkan Data dari tabel dokumen dan tabel penelitian DATA INSTRUMENT
			$research=mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen JOIN tbl_metode_penelitian c ON a.id_metode=c.id_metode WHERE a.id_dosen='$_SESSION[id]' AND a.status='0' ORDER BY id_journal");
			while($r = mysql_fetch_array($research)){
				if ($r[acc]=='1'){
					$acc = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
			echo "
			<tr>
			<td>$r[judul]</td>
			<td width='160px'>$r[metode_penelitian]</td>
			<td>$acc</td>
			<td width=160px>";
			if ($r[review]=='1' AND $r[acc]=='0'){
				echo "<a href='index.php?view=myjournal&act=pilih_metopel&id=$r[id_journal]' class='btn btn-success <b></b>tn-xs'><i class='glyphicon glyphicon-new-window'> Pilih Metopel</i></a></td></tr>";
			}else{
				echo"
				<a href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-new-window'>Pilih Metopel</i></a></tr>";
			} 
		}
			?>
		</tbody>
	</table>

	<div class="text-info">
		Review Version
	</div><hr>

	<tbody>
			<?php
			//File Review INTSRUMENT Researcher
			$research=mysql_query("SELECT * FROM tbl_dokins a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON a.id_dosen=c.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[file_insresearch]'>$r[file_insresearch]</a></td>
			</tr>";
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
			$research=mysql_query("SELECT * FROM tbl_dokins a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON a.id_dosen=c.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
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
			<td align=left width=200px><a href='download.php?file=$r[file_insresearch]'>$r[file_insresearch]</a></td>
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>
			<td width=180px>";
			if ($r[review]=='1' AND $r[acc]=='0'){
				echo "<a href='index.php?view=myjournal&delete_ins=$r[id_instrument]' class='text-info'>Delete</a></td><br></tr>";
			}else{
				echo"<a href='' class='text-warning'> Delete</a></td><br></tr>";
			}
		}
			?>
		</tbody>
	</table><br><hr>

	<div class=text-info>
		<?php echo"<b>REVIEWER</b>" ?> <hr>
		Review Version
	</div>

	<tbody>
			<?php
			//File Review Instrument Peer Reviewer
			$research=mysql_query("SELECT * FROM tbl_ins_review a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON b.id_dosen=c.id_dosen WHERE c.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td><a href='download.php?file=$r[file_insrev]'>$r[file_insrev]</a></td>
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
			//Hitori File Instrument Peer Reviewer
			$research=mysql_query("SELECT * FROM tbl_ins_review a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON b.id_dosen=c.id_dosen WHERE c.id_dosen='$_SESSION[id]' AND b.status='0' ORDER BY a.waktu");
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
			<td align=left width=200px><a href='download.php?file=$r[file_insrev]'>$r[file_insrev]</a></td>
			<td align=left width=150px><small style='color:black'>$tanggal $bln $tahun </small></td>";
		}
			?>
		</tbody>
	</table>
</div>


</div> 
</div>	
</div>
</div>
