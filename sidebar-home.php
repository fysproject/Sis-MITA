		<aside class="widgets">
			<div class="row">
				<div class="col-lg-12">
					<form action='index.mu' method='POST'>
						<div class="input-group">
						<input type="text" name='cari' class="form-control" placeholder="Search">
						<span class="input-group-btn"><button class="btn btn-success" type="button">Search</button></span>
						</div><!-- /input-group -->
					</form>
				</div>
			</div>
				<br>

			<div class="list-group">
				<a href="#" style='background-color:white' class="list-group-item active"><em style='color:orange' class="glyphicon glyphicon-star"></em> Penelitian Populer</a>
				<?php 
					$populer = mysql_query("SELECT * FROM tbl_journal a JOIN tbl_dosen b ON a.id_dosen=b.id_dosen where a.status='1' ORDER BY a.view DESC LIMIT 50");
					while ($p = mysql_fetch_array($populer)){
						echo "<a href='detail-journal-$p[id_journal].mu' class='list-group-item'>$p[judul] - <i>($p[view] View)</i> <br><small style='color:red'>$p[nama]</small><br></a>";
					}
				?>
			</div>
		</aside>