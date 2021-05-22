	<?php include "menumaster.php"; ?>

	<div class="container-fluid">
		<div class="row mt-5">




			<!-- YAZILAR BÖLÜMÜ BAŞLANGIÇ -->
			<div class="col-md-9">
				<div class="row">
					<?php 
					$yazilar = $db->prepare("SELECT * FROM yazilar
						ORDER BY yazi_okunma");
					$yazilar->execute();
					$yazi_listele=$yazilar->fetchALL(PDO::FETCH_ASSOC);

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
						<?php } ?>


					</div>
				</div>

				<!-- YAZILAR BÖLÜMÜ BİTİŞ -->


				<!-- ####################################################################################### -->

				<!-- SAĞ BÖLÜM BAŞLANGIÇ -->

				<?php include 'sag.php'; ?>
				<!-- SAĞ BÖLÜM BİTİŞ -->







			</div>
		</div>

		<?php include "footer.php" ?>



		<script src="js/jquery-3.4.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	</html>