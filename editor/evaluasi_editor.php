<?php 
if (isset($_GET[delete])){
	mysql_query("DELETE FROM tbl_dokresevalap where id_dokresevalap='$_GET[delete]'");
	echo "<script>document.location='evaluasi-editor.mdn';</script>";
}
?>
<?php
if(isset($_GET[deletee])){
	mysql_query("DELETE FROM tbl_dokresevapub where id_dokresevapub='$_GET[deletee]'");
	echo "<script>document.location='evaluasi-editor.mdn';</script>";
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
	   	      <thead>
		        <tr>
		        	<th>Judul</th>	
		        	<th>File</th>
		        	<th>Approved Review Internal</th>
		        	<th>Approved Review Eksternal</th>
		        </tr>
		      </thead>
		      <tbody>
			<?php 	
				$research = mysql_query("SELECT * FROM tbl_dokresevalap a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_users c ON b.penilai_internal=c.nama_lengkap WHERE c.id_users='$_SESSION[id]' AND  b.status='0' ORDER BY a.waktu DESC LIMIT 1");
				while ($r = mysql_fetch_array($research)){
				if ($r[acc_reseminar]=='1'){
					$acc_reseminar = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc_reseminar = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
				if ($r[acc_reslap]=='1'){
					$acc_reslap = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
				}else{
					$acc_reslap = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
				}
					echo "<tr>
							  <td>$r[judul]</td>
							  <td><a href='download.php?file=$r[file_evalap]'>$r[file_evalap]</a></td>
							  <td align=center>$acc_reseminar</td>
							  <td align=center>$acc_reslap</td>";
				}
			?>
			  </tbody>
		</table>
		</div>

<?#--------------------------------------------------Session Publikasi---------------------------------------------------#?>

<div role="tabpanel" class="tab-pane fade" id="tab2" aria-label="entertainment">
	<table class="table">
		<thead>
			<tr>
				<th>Judul</th>
				<th>File</th>
				<th>Approved Review Internal</th>
				<th>Approved Review Eksternal</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$research=mysql_query("SELECT * FROM tbl_dokresevapub a JOIN tbl_journal b ON a.id_journal=b.id_journal JOIN tbl_users c ON b.penilai_internal=c.nama_lengkap WHERE c.id_users='$_SESSION[id]' AND  b.status='0' ORDER BY a.waktu DESC LIMIT 1");
			while($r = mysql_fetch_array($research)){
			echo "
			<tr>
			<td>$r[judul]</td>
			<td><a href='download.php?file=$r[file_evapub]'>$r[file_evapub]</a></td>
			<td align=center>$acc_reseminar</td>
			<td align=center>$acc_reslap</td>";
			
		}
			?>
		</tbody>
	</table> <br>
</div>

</div>	
</div>
</div>