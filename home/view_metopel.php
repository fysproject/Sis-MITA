<div class="row">
	<div class="col-md-12">
		<article>	
		<div class="alert alert-info">
		<?php 
			$k = mysql_fetch_array(mysql_query("SELECT * FROM tbl_metode_penelitian where id_metode='$_GET[kat]'"));
				echo "Daftar Metodologi Penelitian <strong>$k[metode_penelitian]</strong>";
		?>
	    </div>
			<?php 		
				$p      = new Paging2;
				$batas  = 5;
				$posisi = $p->cariPosisi($batas);
				$no = $posisi+1;
					$research = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen
												JOIN tbl_metode_penelitian c ON a.id_metode=c.id_metode where a.status='1' AND a.id_metode='$_GET[kat]' ORDER BY a.id_journal DESC LIMIT $posisi, $batas");
				while ($r = mysql_fetch_array($research)){
					$latar_belakang = substr($r[latar_belakang],0,550);
					echo "<h4 class='title' style='color:white'>$r[judul]</h4>
					      <b class='paragraph' style='color:black'> $r[nama]</b>
					      <a class='pull-right btn btn-info btn-xs' href=''>$r[metode_penelitian]</a>
					      <p class='paragraph' align='justify'><b class='btn btn-link btn-xs'>Latar Belakang</b> - $latar_belakang <a href='detail-journal-$r[id_journal].mu' class='btn btn-link btn-xs'>[ Read More ]</a></p>";
				}

					$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_journal where status='1' AND id_metopel='$_GET[kat]'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halkat], $jmlhalaman);
			?>

					<nav>
 						<ul class="pagination">
							<?php echo $linkHalaman ?>
						</ul>
					</nav>
		</article>
	</div>
</div>