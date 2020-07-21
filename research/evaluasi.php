<?php 
if (isset($_GET[delete])){
	mysql_query("DELETE FROM tbl_dokresevalap where id_dokresevalap='$_GET[delete]'");
	echo "<script>document.location='evaluasi.mdn';</script>";
}
?>
<?php
if(isset($_GET[deletee])){
	mysql_query("DELETE FROM tbl_dokresevapub where id_dokresevapub='$_GET[deletee]'");
	echo "<script>document.location='evaluasi.mdn';</script>";
} ?>



<div class="row">
	<div class="col-md-12">
		<ul id="myTabs" class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#tab1" id="tab1-tab" role="tab" data-toggle="tab" aria-controls="tab1" aria-expanded="true">Laporan</a>
			</li>
			<li role="presentation" class="">
				<a href="#tab2" id="tab2-tab" role="tab" data-toggle="tab" aria-controls="tab2" aria-expanded="false">Publikasi</a>
			</li>
		</ul><br>
<? #--------------------------------------------------Session Laporan-------------------------------#?>
	   <div id="myTabContent" class="tab-content">
	   <div role="tabpanel" class="tab-pane fade active in" id="tab1" aria-label="entertainment">
	   <table class="table table-responsive">
	   	<?php
	   	//menambah dokumen laporan
	   	$research = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND  a.status='0' ORDER BY id_journal DESC LIMIT 1");
				while ($r = mysql_fetch_array($research)){
					echo"<a title='Upload Laporan' href='index.php?view=evaluasi&act=uploadlap&id=$r[id_journal]' class='btn btn-info btn-xs'><i class='glyphicon glyphicon-upload'>Upload</i></a>";
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
				$research = mysql_query("SELECT * FROM tbl_dokresevalap a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON a.id_dosen=c.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND  b.status='0' ORDER BY a.waktu DESC LIMIT 1");
				while ($r = mysql_fetch_array($research)){
					echo "<tr>
							  <td>$r[judul]</td>
							  <td><a href='download.php?file=$r[file_evalap]'>$r[file_evalap]</a></td>
							  <td width='100px'>";
							  if ($r[acc_reseminar]=='1') {
							  	echo "<a title='Edit' href='index.php?view=evaluasi&act=editevalap&id=$r[id_journal]' class='btn btn-info btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
							  	 <a title='Delete' href='index.php?view=evaluasi&delete=$r[id_dokresevalap]' class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td></tr>";
							  }else{
							  	echo "<a title='Edit' href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
							  	 <a title='Delete' href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-trash'></i></a></tr>";
							  }
				}
			?>
			  </tbody>
		</table>
		</div>

<?#--------------------------------------------------Session Publikasi---------------------------------------------------#?>

<div role="tabpanel" class="tab-pane fade" id="tab2" aria-label="entertainment">
	<table class="table">
		<?php
	   	//Upload Dokumen Publikasi
	   	$research = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND  a.status='0' ORDER BY id_journal DESC LIMIT 1");
				while ($r = mysql_fetch_array($research)){
					echo"<a title='Upload Dokumen' href='index.php?view=evaluasi&act=uploadpublis&id=$r[id_journal]' class='btn btn-info btn-xs'><i class='glyphicon glyphicon-upload'> Upload</i></a>";
				}
		?>
		<thead>
			<tr>
				<th>Title</th>
				<th>File</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$research=mysql_query("SELECT * FROM tbl_dokresevapub a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_dosen c ON a.id_dosen=c.id_dosen WHERE a.id_dosen='$_SESSION[id]' AND  b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td>$r[judul]</td>
			<td><a href='download.php?file=$r[file_evapub]'>$r[file_evapub]</a></td>
			<td width=160px>";
			if ($r[acc_reseminar]=='1'){
				echo "<a title='Edit Dokumen' href='index.php?view=evaluasi&act=editevapub&id=$r[id_journal]' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
				<a title='Delete' href='index.php?view=evaluasi&deletee=$r[id_dokresevapub]' class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td></tr>";
			}else{
				echo"
				<a title='Edit' href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-upload'>Upload</i></a>
				<a title='Delete' href='' class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></tr>";
			} 
		}
			?>
		</tbody>
	</table> <br>
</div>

</div>	
</div>
</div>