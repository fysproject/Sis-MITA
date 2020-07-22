<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-success">
		<?php 
			if (isset($_POST[cari])){
				echo "Hasil Pencarian Penelitian dengan Keyword <strong>'$_POST[cari]'</strong>";
			}else{
				echo "Daftar Penelitian yang telah Diterbitkan";
			}
		?>
	    </div>
			<?php 		
				$p      = new Paging1;
				$batas  = 5;
				$posisi = $p->cariPosisi($batas);
				$no = $posisi+1;
				if (isset($_POST[cari])){
					$journal = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen where a.status='1' AND a.judul LIKE '%$_POST[cari]%' ORDER BY a.id_journal DESC LIMIT $posisi, $batas");
				}else{
					$journal = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen where a.status='1' ORDER BY a.id_journal DESC LIMIT $posisi, $batas");
				}
				while ($j = mysql_fetch_array($journal)){
					$latar_belakang = substr($j[abstrak],0,550);
					echo "<h1 class='title'>$j[judul]</h1>
					      <b class='paragraph' style='color:red'> $j[nama]</b>
					      <p class='paragraph'><b class='btn btn-link btn-xs'>Latar Belakang</b> - $latar_belakang.. <a href='detail-journal-$j[id_journal].mu' class='btn btn-link btn-xs'>[ Read More ]</a></p>";
				}
				if (isset($_POST[cari])){
					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_journal where status='1' AND judul LIKE '%$_POST[cari]%'"));
				}else{
					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_journal where status='1'"));
				}
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halutama], $jmlhalaman);
			?>

					<nav>
 						<ul class="pagination">
							<?php echo $linkHalaman ?>
						</ul>
					</nav>
		</article>
	</div>
</div>