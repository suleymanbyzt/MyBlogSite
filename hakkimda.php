<?php include 'menumaster.php'; 
$hakkimda_id=1;
$hakkimda=$db->prepare("SELECT * FROM hakkimda WHERE hakkimizda_id=?");
$hakkimda->execute(array($hakkimda_id));
$hakkimda_cek=$hakkimda->fetch(PDO::FETCH_ASSOC);

?>
<div class="container-fluid">
	<div class="row mt-5">




		<!-- YAZILAR BÖLÜMÜ BAŞLANGIÇ -->
		<div class="col-md-9" align="center">
			
			<img width="250" style="border-radius: 100%;"src=" img/<?php echo $hakkimda_cek["hakkimizda_foto"]; ?>" alt="Süleyman Bayazit"> <br> <br>
			<h4 class="display-4">Hakkımda</h4>
			<hr>
			<p>
				<?php echo $hakkimda_cek["hakkimizda_aciklama"]; ?>
			</p>
			
		</div>
		<?php include 'sag.php'; ?>
	</div>
</div>


<?php include 'footer.php'; ?>