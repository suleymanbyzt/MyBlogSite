<?php include 'sistem/baglan.php';

$ayarlar = $db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayarcek=$ayarlar->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title><?php echo $ayarcek["site_tittle"]; ?></title>
	<meta name="description" content="<?php echo $ayarcek["site_desc"]; ?>">
	<meta name="keywords" content="<?php echo $ayarcek["site_keyw"]; ?>">
	<meta name="author" content="Süleyman Bayazit">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/<?php echo $ayarcek["site_favicon"]; ?>"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">	
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link href="https://fonts.googleapis.com/css?family=Baloo+Tamma+2|Nunito:300i&display=swap" rel="stylesheet">

	
</head>
<body style="font-family: 'Baloo Tamma 2', cursive;">
	<nav class="navbar navbar-expand-lg navbar-light" style="background: #E8EAED;">
		<a class="navbar-brand" href="index.php"><img src="img/<?php echo $ayarcek["site_logo"]; ?>" width="130"></a> 
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent" align="center">
			<ul class="navbar-nav ml-auto" style="font-size: 20px; ">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Anasayfa</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="hakkimda.php">Hakkımda</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="iletisim.php">İletişim</a>
				</li>
				
			</ul>
		</div>
	</nav>

	




	<script src="js/jquery-3.4.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>