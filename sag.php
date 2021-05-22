
<div class="col-md-3">
	<div class="card">
		<h6 class="card-header text-muted" style="background: #E8EAED;">Arama Kutusu</h6>
		<div class="card-body">
			<div class="input-group">
				<form action="ara.php" method="GET">
				<input type="search" class="form-control" placeholder="Kelime Girin..." name="ara">
				</form>
			</div>
		</div>
	</div>


	<div class="card mt-2">
		<div class="card-header text-center text-muted" style="background: #E8EAED;"> <strong>Kategoriler</strong></div>
		<div class="card-body">
			<?php 
			$kategoriler = $db->prepare("SELECT * FROM kategoriler");
			$kategoriler->execute();
			$kategori_listele = $kategoriler->fetchALL(PDO::FETCH_ASSOC);

			foreach ($kategori_listele as $row) { ?>
				<div class="card-text" align="center">
					<a class="text-dark" href="kategori-listele.php?kategori_id=<?php echo $row["kategori_id"]; ?>"><?php echo $row ["kategori_tittle"]; ?></a><br>


				</div>
			<?php } ?>

		</div>
	</div>


		<div class="card">
			<div class="card-header text-center"><strong>En Çok Okunanlar</strong></div>

			<?php 
			$yazilar = $db->prepare("SELECT * FROM yazilar
				ORDER BY yazi_okunma DESC LIMIT 3");
			$yazilar->execute();
			$yazi_listele=$yazilar->fetchALL(PDO::FETCH_ASSOC);

			foreach ($yazi_listele as $row) { ?>
				<div class="card-body">
					<div class="card-header" align="center">

						<img style="width: 9rem;" title="<?php echo $row["yazi_tittle"]; ?>" src="img/yazilar/<?php echo $row["yazi_foto"]; ?>"> <br><br>
						<a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>	"><?php echo $row["yazi_tittle"]; ?></a><br>
						<p class="text-muted text-sm-center">
							<i class="fas fa-table mr-1"></i>
							<?php echo $row["yazi_tarih"]; ?></p>
							<i class="far fa-eye mr-1"></i>
							<?php echo $row["yazi_okunma"]; ?>
						</div>
					</div>
				<?php } ?>
			</div>
	<div class="card my-4">
		<h6 class="card-header lead text-muted" style="background: #E8EAED;">Reklam Alanı</h6>
		<div align="center" class="card-body">
			<img class="img-fluid" src="http://via.placeholder.com/400x400" alt="Reklam Alanı">
		</div>
	</div>
</div>