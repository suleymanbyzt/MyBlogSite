<?php include 'menumaster.php';

$yazi_id = $_GET["yazi_id"];
$yazilar=$db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id WHERE yazi_id=?");
$yazilar->execute(array($yazi_id));
$yazi_cek = $yazilar->fetch(PDO::FETCH_ASSOC);
?>
<div class="container-fluid">
	<div class="row mt-5">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-12">
					<div class="card" align="center">

						<div class="card-body">
							<img class="card-img-top" src="img/yazilar/<?php echo $yazi_cek["yazi_foto"];?>" alt="<?php echo $yazi_cek["yazi_tittle"]; ?>">
							<br>
							<div class="card-title text-center" style="font-size: 40px;"><?php echo $yazi_cek["yazi_tittle"]; ?></div>
							<div class="text-muted text-sm"><i class="fas fa-table mr-1"></i><?php echo $yazi_cek["yazi_tarih"]; ?>
							<i class="far fa-eye mr-1 ml-3"></i>
							<?php echo $yazi_cek["yazi_okunma"]; ?>
							<a href="hakkimda.php" class="text-dark text-muted"><i class="fas fa-user ml-3 mr-1"></i>Süleyman Bayazit</a>

						</div> <br><hr>
						<div class="card-text">
							<?php echo $yazi_cek["yazi_icerik"]; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'sag.php'; ?>

</div>

</div>
<?php include 'footer.php'; ?>