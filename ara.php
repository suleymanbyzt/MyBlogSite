<?php include 'menumaster.php';

$ara = strip_tags($_GET["ara"]);

?>


<div class="container-fluid">
	<div class="row mt-5">



		<div class="col-md-9">
			<div class="row">

				
				<?php 
				$yazilar = $db->prepare("SELECT * FROM yazilar
					INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id WHERE yazi_tittle LIKE ? ORDER BY yazi_id DESC");
				$yazilar->execute(array('%'.$ara.'%'));
				$yazi_listele = $yazilar->fetchALL(PDO::FETCH_ASSOC);
				$yazi_say = $yazilar->rowCount();

				if ($yazi_say) {
					


					foreach ($yazi_listele as $row) { ?>
						<div class="col-md-6">

							<div class="card mt-2 mb-2">



								<a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="<?php echo $row["yazi_tittle"]; ?>">

									<!-- FOTO -->

									<img height="300" src="img/yazilar/<?php echo $row["yazi_foto"]; ?>" class="card-img-top" alt="<?php echo $row["yazi_tittle"]; ?>"></a>

									<!-- BAŞLIK -->

									<div class="card-header text-muted text-center" style="font-size: 25px;"><a class="text-dark" href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><?php echo $row["yazi_tittle"]; ?></a>
									</div>

									<div class="card-body">

									</div>
									<!-- YAZI TARİH VE OKUNMA -->
									<div class="text-muted text-sm" align="center">
										<i class="fas fa-table mr-1"></i>
										<?php echo $row["yazi_tarih"]; ?><br><br> 
										<i class="far fa-eye mr-1"></i>
										<?php echo $row["yazi_okunma"]; ?> <br><br>

										<a href="detay.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><button class="btn btn-danger mb-2">Devamını Oku</button></a>

									</div>

								</div>
							</div>
						<?php } } else{

							echo "Aradığınız Kelime İle İlgili Sonuç Bulunamadı";
						} ?>
					</div>
				</div>









				<?php include 'sag.php'; ?>
			</div>
		</div>
		<?php include 'footer.php'; ?>
