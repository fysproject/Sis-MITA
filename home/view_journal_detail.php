<?php 
	if (isset($_POST[simpan])){
		$sekarangwaktu = date("Y-m-d H:i:s");
		mysql_query("INSERT INTO tbl_journal_note VALUES('','$_GET[journal]','$_SESSION[id]','$_POST[a]','$sekarangwaktu')");
		echo "<script>document.location='detail-journal-".$_GET['journal'].".mu';</script>";
	}
?>
<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
	        Detail Research
	    </div>
			<?php 	
			if (isset($_SESSION[id])){
				$journal = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen
												where a.id_journal='$_GET[journal]'");
			}else{
				$journal = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen
												where a.status='1' AND a.id_journal='$_GET[journal]'");
			}	
				mysql_query("UPDATE tbl_journal SET view=view+1 where id_journal='$_GET[journal]'");
				while ($j = mysql_fetch_array($journal)){
					$latar_belakang = nl2br($j[latar_belakang]);
					if ($j[status]=='1'){
						$status = '<span class="text-success">Published</span>';
					}else{
						$status = '<span class="text-danger">Unpublished</span>';
					}
					if ($j[review]=='1'){
						$review = '<span class="text-success">Approved</span>';
					}else{
						$review = '<span class="text-danger">Unapproved</span>';
					}

					if ($j[editor]=='1'){
						$editor = '<span class="text-success">Approved</span>';
					}else{
						$editor = '<span class="text-danger">Unapproved</span>';
					}

					echo "<table class='table table-striped table-bordered'>
		                    <tbody>
		                    	<tr><th width='120px'>Author </th><td> <a data-toggle='collapse' href='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>$j[nama]</a>
		                    		<div class='collapse' id='collapseExample'>
									  <div class='well'>
									  	<table>
										  	<tr><td>No Telpon</td> <td> : $j[no_telpon]</td></tr>
										  	<tr><td>E-mail</td> <td> : $j[email]</td></tr>
									  	</table>
									  </div>
									</div>
		                    	</td></tr>
		                    	<tr><th>Judul </th><td> <a href=''>$j[judul]</a></td></tr>
		                    	<tr><th>Latar Belakang </th><td>$j[latar_belakang]</td></tr>";
		                    	if (isset($_SESSION[id])){
		                    		echo "<tr><th>Reviewer </th><td> $review</td></tr>
		                    			  <tr><th>Editor </th><td> $editor</td></tr>
		                    			  <tr><th>Status </th><td> <b>$status</b></td></tr>
		                    			  <tr><th>Waktu Kirim </th><td> $j[waktu_kirim]</td></tr>"; 
		                   		}
		                    echo "</tbody>
	                     </table>";
				}
			?>

			<?php if (isset($_SESSION[id])){ ?>
				<div class="alert alert-info">
			        All Review <?php if ($_SESSION[level] != 'dosen'){ echo "<a style='margin-top:-5px' class='pull-right btn btn-primary btn-sm' href='' data-toggle='modal' data-target='#tambahrevisi'>Tambahkan Revisi</a>"; } ?>
				</div>
					<?php if ($_SESSION[level] == 'reviewer'){ ?>
						<ul id="myTabs" class="nav nav-tabs" role="tablist">
							<li role="presentation" class=""><a href="#revisi1" id="revisi1-tab" role="tab" data-toggle="tab" aria-controls="revisi1" aria-expanded="false">Reviewer</a></li>
						</ul><br>

						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade" id="revisi1" aria-labelledby="revisi1-tab">
								<table class="table table-condensed table-hover">
									<tbody>
									<?php 
										$reviewer = mysql_query("SELECT * FROM tbl_journal_note a JOIN tbl_users b ON a.id_users=b.id_users where a.id_journal='$_GET[journal]' AND b.level='reviewer' ORDER BY a.id_journal_note DESC");
										while ($re = mysql_fetch_array($reviewer)){
											$tahun = substr($re[waktu], 0,4);
											$bulan = substr($re[waktu], 5,2);
											$tanggal = substr($re[waktu], 8,2);
											$jam = substr($re[waktu], 11,8);
											if ($cek == 0){
												$cek2 = substr($bulan,1,1);
												$bulanc = $cek2;
											}else{
												$bulanc = $bulan;
											}

											$bln = $a[$bulanc];
											echo "<tr><th width='120px' scope='row'>$re[nama_lengkap]</th> 	<td><small style='color:red'>($tanggal $bln $tahun, $jam)</small> - $re[catatan]</td></tr>";
										}
									?>
									</tbody>
								</table>
							</div>
							
					<?php }else{ ?>
						<ul id="myTabs" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#revisi1" id="revisi1-tab" role="tab" data-toggle="tab" aria-controls="revisi1" aria-expanded="true">Reviewer</a></li>
							<li role="presentation" class=""><a href="#revisi2" role="tab" id="revisi2-tab" data-toggle="tab" aria-controls="revisi2" aria-expanded="false">Editor</a></li>
						</ul><br>

						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade active in" id="revisi1" aria-labelledby="revisi1-tab">
								<table class="table table-condensed table-hover">
									<tbody>
									<?php 
										$reviewer = mysql_query("SELECT * FROM tbl_journal_note a JOIN tbl_users b ON a.id_users=b.id_users where a.id_journal='$_GET[journal]' AND b.level='reviewer' ORDER BY a.id_journal_note DESC");
										while ($re = mysql_fetch_array($reviewer)){
											$tahun = substr($re[waktu], 0,4);
											$bulan = substr($re[waktu], 5,2);
											$tanggal = substr($re[waktu], 8,2);
											$jam = substr($re[waktu], 11,8);
											if ($cek == 0){
												$cek2 = substr($bulan,1,1);
												$bulanc = $cek2;
											}else{
												$bulanc = $bulan;
											}

											$bln = $a[$bulanc];
											echo "<tr><th width='120px' scope='row'>$re[nama_lengkap]</th> 	<td><small style='color:red'>($tanggal $bln $tahun, $jam)</small> - $re[catatan]</td></tr>";
										}
									?>
									</tbody>
								</table>
							</div>

							<div role="tabpanel" class="tab-pane fade" id="revisi2" aria-labelledby="revisi2-tab">
								<table class="table table-condensed table-hover">
									<tbody>
									<?php 
										$reviewer = mysql_query("SELECT * FROM tbl_journal_note a JOIN tbl_users b ON a.id_users=b.id_users where a.id_journal='$_GET[journal]' AND b.level='editor' ORDER BY a.id_journal_note DESC");
										while ($re = mysql_fetch_array($reviewer)){
											$tahun = substr($re[waktu], 0,4);
											$bulan = substr($re[waktu], 5,2);
											$tanggal = substr($re[waktu], 8,2);
											$jam = substr($re[waktu], 11,8);
											if ($cek == 0){
												$cek2 = substr($bulan,1,1);
												$bulanc = $cek2;
											}else{
												$bulanc = $bulan;
											}

											$bln = $a[$bulanc];
											echo "<tr><th width='120px' scope='row'>$re[nama_lengkap]</th> 	<td><small style='color:red'>($tanggal $bln $tahun, $jam)</small> - $re[catatan]</td></tr>";
										}
									?>
									</tbody>
								</table>
							</div>
						</div>
					<?php } ?>
			<?php } ?>
		</article>
	</div>

</div>