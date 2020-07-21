<?php 
if (isset($_GET[delete])){
	mysql_query("DELETE FROM tbl_journal WHERE id_journal='$_GET[delete]'");
	echo "<script>document.location='index.php?view=journaladmin';</script>";
}
?>

<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
		<?php 
				echo "Daftar Penelitian";
		?>
	    </div>
	    <a href='index.php?view=journaladmin&act=tambah' class='btn btn-primary btn-sm' style='margin-bottom:2px'>Tambahkan Penelitian</a>
	    <table class="table table-condensed table-bordered">
		      <thead>
		        <tr class="alert alert-success">
		        	<th scope="row">No</th> 
		        	<th>Judul</th>	
		        	<th>Tanggal</th>
		        	<th>Peer Reviewer Ekseternal</th>
		        	<th>Peer Reviewer Internal</th>	
		        	<th>Reviewer Ekseternal</th>
		        	<th>Reviewer Internal</th>
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
				$journal = mysql_query("SELECT * FROM tbl_journal ORDER BY id_journal DESC LIMIT $posisi, $batas");
				while ($j = mysql_fetch_array($journal)){
					if ($j[status]=='1'){
						$status = '<span class="text-success">Published</span>';
					}else{
						$status = '<span class="text-danger">Unpublished</span>';
					}

					if ($j[review]=='1'){
						$review = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
					}else{
						$review = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
					}

					if ($j[editor]=='1'){
						$editor = '<span class="text-success"><i class="glyphicon glyphicon-ok"></i></span>';
					}else{
						$editor = '<span class="text-danger"><i class="glyphicon glyphicon-remove"></i></span>';
					}

					$ex = explode(' ',$j[waktu_kirim]);
					echo "<tr><td>$no</td>
							  <td><a href='detail-journal-$j[id_journal].mu'>$j[judul]</a></td>
							  <td>".tgl_indo($ex[0])."</td>
							  <td>$j[penilai_eksternal]</td>
							  <td>$j[penilai_internal]</td>
							  <td>$review</td>
							  <td>$editor</td>
							  <td style='background:#fefcca'>$status</td>
							  <td width=160px>
							  	  <a href='detail-journal-$j[id_journal].mu' class='btn btn-primary btn-xs'>Detail</a>";
							  	if ($j[editor]=='1' AND $j[review]=='1'){
								  	  if ($j[status]=='1'){
								  	  	  echo "<a title=Publish href='index.php?view=journaladmin&journal=$j[id_journal]&publish=0' style='width:35px; margin-left:5px' class='btn btn-warning btn-xs' onclick=\"return confirm('Are You Sure Unpublish this Research?')\"><i class='glyphicon glyphicon-thumbs-down'></i></a> ";
								  	  }else{
									  	  echo "<a title=Unpublish href='index.php?view=journaladmin&journal=$j[id_journal]&publish=1' style='width:35px; margin-left:5px' class='btn btn-info btn-xs' onclick=\"return confirm('Are You Sure Publish this Research?')\"><i class='glyphicon glyphicon-thumbs-up'></i></a> ";
									  }
								  echo "<a title=Edit href='index.php?view=journaladmin&act=edit&id=$j[id_journal]' class='btn btn-success btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
								  	    <a title=Delete href='index.php?view=journaladmin&delete=$j[id_journal]' class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td>";
								}else{
								  	  echo "<a title=Publish href='' style='width:35px; margin-left:5px' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-thumbs-down'></i></a>
								  	  		<a title=Edit href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
								  	  		<a title='Pilih Penilai' href='index.php?view=journaladmin&act=pilih&id=$j[id_journal]' class='btn btn-success btn-xs'><i class='glyphicon glyphicon-new-window'></i></a>
								  	  		<a title=Delete href='' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-trash'></i></a></td>";
								}
						  echo "</tr>";
					$no++;
				}
					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_journal"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					if (isset($_GET[publish])){
						mysql_query("UPDATE tbl_journal SET status='$_GET[publish]' where id_journal='$_GET[journal]'");
						echo "<script>document.location='index.php?view=journaladmin';</script>";
					}
			?>
			  </tbody>
		</table>
					<nav>
 						<ul class="pagination">
							<?php echo $linkHalaman ?>
						</ul>
					</nav>
		</article>
	</div>
</div>