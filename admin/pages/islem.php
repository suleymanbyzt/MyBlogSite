<?php 


include 'kontrol.php';



// SİTE AYAR DÜZENLEME
include '../../sistem/baglan.php';
extract($_POST);
if (isset($genel_ayarlar)) {
	
	if (!$site_tittle || !$site_url || !$site_desc || !$site_keyw) {

		header("Location: genel-ayarlar.php?update=bos");
	}else{
		$ayarlar=$db->prepare("UPDATE ayarlar SET site_tittle=?, site_url=?, site_desc=?, site_keyw=? WHERE site_id=?");
		$update = $ayarlar->execute(array($site_tittle,$site_url,$site_desc,$site_keyw,1));
		if ($update) {
			header("Location: genel-ayarlar.php?update=yes");
		}else{
			header("Location: genel-ayarlar.php=update=no");
		}
	}
}








// SOSYAL MEDYA DÜZENLEME
if (isset($sosyal_medya)) {
	
	if (!$site_linkedin || !$site_github || !$site_twitter || !$site_youtube || !$site_instagram) {

		header("Location: sosyalmedya.php?update=bos");
	}else{
		$ayarlar=$db->prepare("UPDATE ayarlar SET site_linkedin=?, site_github=?, site_twitter=?, site_youtube=?, site_instagram=? WHERE site_id=?");
		$update = $ayarlar->execute(array($site_linkedin,$site_github,$site_twitter,$site_youtube,$site_instagram,1));
		if ($update) {
			header("Location: sosyalmedya.php?update=yes");
		}else{
			header("Location: sosyalmedya.php=update=no");
		}
	}
}





// LOGO DÜZENLEME

$Dosyaturu = array("image/jpeg","image/jpg","image/png","image/x-png");
$Dosyauzanti=array("jpeg","jpg","png","x-png");
if (isset($logo)) {
	if ($_FILES["site_logo"]["size"] > 0 ) {
		$kaynak = $_FILES["site_logo"]["tmp_name"];
		$isim = $_FILES["site_logo"]["name"];
		$boyut = $_FILES["site_logo"]["size"];
		$turu = $_FILES["site_logo"]["type"];

		$uzanti = substr($isim,strpos($isim, ".")+1);
		$resimAd = rand()."_".$isim;
		$hedef="../../img/".$resimAd;
		if ($kaynak) {
			if (!in_array($uzanti, $Dosyauzanti) && !in_array($turu, $Dosyaturu)) {
				header("Location: logo-favicon.php?update=gecersizuzanti");
			}elseif ($boyut > 1024 * 1024) {
				header("Location: logo-favicon.php?update=buyuk");
			}else{
				$sil= $db->prepare("SELECT * FROM ayarlar WHERE site_id=?");
				$sil->execute(array(1));
				$eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
				$eski_resim["site_logo"];

				unlink("../../img/".$eski_resim["site_logo"]);

				if (move_uploaded_file($kaynak, $hedef)) {
					$yukle = $db->prepare("UPDATE ayarlar SET site_logo=? WHERE site_id=?");
					$update = $yukle->execute(array($resimAd,1));

					if ($update) {
						header("Location: logo-favicon.php?update=yes");
					}else{
						header("Location: logo.favicon.php?update=no");
					}
				}
			}
		}
	}else{
		header("Location: logo-favicon.php?update=bos");
	}
}






// FAVİCON DÜZENLEME

$Dosyaturu = array("image/jpeg","image/jpg","image/png","image/x-png");
$Dosyauzanti=array("jpeg","jpg","png","x-png","ico");
if (isset($logo)) {
	if ($_FILES["site_favicon"]["size"] > 0 ) {
		$kaynak = $_FILES["site_favicon"]["tmp_name"];
		$isim = $_FILES["site_favicon"]["name"];
		$boyut = $_FILES["site_favicon"]["size"];
		$turu = $_FILES["site_favicon"]["type"];

		$uzanti = substr($isim,strpos($isim, ".")+1);
		$resimAd = rand()."_".$isim;
		$hedef="../../img/".$resimAd;
		if ($kaynak) {
			if (!in_array($uzanti, $Dosyauzanti) && !in_array($turu, $Dosyaturu))
			{
				header("Location: logo-favicon.php?update=gecersizuzanti");
			}
			elseif ($boyut > 1024 * 1024)
			{
				header("Location: logo-favicon.php?update=buyuk");
			}
			else{
				$sil= $db->prepare("SELECT * FROM ayarlar WHERE site_id=?");
				$sil->execute(array(1));
				$eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
				$eski_resim["site_favicon"];

				unlink("../../img/".$eski_resim["site_favicon"]);

				if (move_uploaded_file($kaynak, $hedef))
				{
					$yukle = $db->prepare("UPDATE ayarlar SET site_favicon=? WHERE site_id=?");
					$update = $yukle->execute(array($resimAd,1));

					if ($update) 
					{
						header("Location: logo-favicon.php?update=yes");
						
					}
					else
					{
						header("Location: logo.favicon.php?update=no");
					}
				}
			}
		}
	}else{
		header("Location: logo-favicon.php?update=bos");
	}
}







// YAZI DÜZENLEME YERİ

$Dosyaturu = array("image/jpeg","image/jpg","image/png","image/x-png");
$Dosyauzanti=array("jpeg","jpg","png","x-png","ico");
if (isset($yazi_duzenle)) {
	$yazi_id=$_GET["yazi_id"];
	if ($_FILES["yazi_foto"]["size"] > 0 )
	{

		
		$kaynak = $_FILES["yazi_foto"]["tmp_name"];
		$isim = $_FILES["yazi_foto"]["name"];
		$boyut = $_FILES["yazi_foto"]["size"];
		$turu = $_FILES["yazi_foto"]["type"];

		$uzanti = substr($isim,strpos($isim, ".")+1);
		$resimAd = rand()."_".$isim;
		$hedef="../../img/yazilar/".$resimAd;
		if ($kaynak)
		{
			if (!in_array($uzanti, $Dosyauzanti) && !in_array($turu, $Dosyaturu))
			{
				header("Location: yazilar.php?update=gecersizuzanti");
			}
			elseif ($boyut > 1024 * 1024)
			{
				header("Location: yazilar.php?update=buyuk");
			}
			else
			{
				$sil= $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
				$sil->execute(array($yazi_id));
				$eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
				$eski_resim["yazi_foto"];

				unlink("../../img/yazilar/".$eski_resim["yazi_foto"]);

				if (move_uploaded_file($kaynak, $hedef))
				{
					$yukle = $db->prepare("UPDATE yazilar SET yazi_foto=?, yazi_tittle=?, yazi_kategori_id=?, yazi_icerik=? WHERE yazi_id=?");
					$update = $yukle->execute(array($resimAd,$yazi_tittle,$yazi_kategori,$yazi_icerik,$yazi_id));

					if ($update)
					{
						header("Location: yazilar.php?update=yes");
					}
					else
					{
						header("Location: yazilar.php?update=no");
					}
				}
			}
		}
	}
	else{
		if (!$yazi_tittle || !$yazi_icerik || !$yazi_kategori)
		{
			header("Location: yazilar.php?update=bos");
		}
		else
		{
			$yukle = $db->prepare("UPDATE yazilar SET  yazi_tittle=?, yazi_kategori_id=?, yazi_icerik=? WHERE yazi_id=?");
			$update = $yukle->execute(array($yazi_tittle,$yazi_kategori,$yazi_icerik,$yazi_id));

			if ($update)
			{
				header("Location: yazilar.php?update=yes");
			}
			else
			{
				header("Location: yazilar.php?update=no");
			}
		}
		
	}
}






// yazı ekle

$Dosyaturu = array("image/jpeg","image/jpg","image/png","image/x-png");
$Dosyauzanti=array("jpeg","jpg","png","x-png","ico");
if (isset($yazi_ekle)) {
	$kaynak = $_FILES["yazi_foto"]["tmp_name"];
	$isim = $_FILES["yazi_foto"]["name"];
	$boyut = $_FILES["yazi_foto"]["size"];
	$turu = $_FILES["yazi_foto"]["type"];

	$uzanti = substr($isim,strpos($isim, ".")+1);
	$resimAd = rand()."_".$isim;
	$hedef="../../img/yazilar/".$resimAd;
	if ($kaynak)
	{
		if (!in_array($uzanti, $Dosyauzanti) && !in_array($turu, $Dosyaturu))
		{
			header("Location: yazilar.php?update=gecersizuzanti");
		}
		elseif ($boyut > 1024 * 1024)
		{
			header("Location: yazilar.php?update=buyuk");
		}
		else
		{


			if (move_uploaded_file($kaynak, $hedef))
			{
				$yukle = $db->prepare("INSERT INTO yazilar SET yazi_foto=?, yazi_tittle=?, yazi_kategori_id=?, yazi_icerik=?");
				$insert = $yukle->execute(array($resimAd,$yazi_tittle,$yazi_kategori,$yazi_icerik));

				if ($insert)
				{
					header("Location: yazilar.php?update=yes");
				}
				else
				{
					header("Location: yazilar.php?update=no");
				}
			}
		}
	}

}












// kategori ekleme işlemi
if (isset($kategori_ekle)) {
	if (!$kategori_tittle) {
		header("Location: kategoriler.php?sonuc=bos");
	}else{
		$ayarlar = $db->prepare("INSERT INTO kategoriler SET kategori_tittle=?");
		$insert = $ayarlar->execute(array($kategori_tittle));

		if ($insert) {
			header("Location: kategoriler.php?sonuc=yes");
		}else{
			header("Location: kategoriler.php?sonuc=no");
		}
	}
}









// kategori düzenleme işlemi
if (isset($kategori_duzenle)) {
	$kategori_id = $_GET["kategori_id"];

	if (!$kategori_tittle) {
		header("Location: kategoriler.php?sonuc=bos");
	}else{
		$kategoriler = $db->prepare("UPDATE kategoriler SET kategori_tittle=? WHERE kategori_id=?");
		$update = $kategoriler->execute(array($kategori_tittle,$kategori_id));

		if ($update) {
			header("Location: kategoriler.php?sonuc=yes");
		}else{
			header("Location: kategoriler.php?sonuc=no");
		}
	}
}







// kategori silme işlemi
$kategorisil_id = $_GET["kategorisil_id"];
if (isset($kategorisil_id)) {
	$kategoriler = $db->prepare("DELETE FROM kategoriler WHERE kategori_id=?");
	$delete = $kategoriler->execute(array($kategorisil_id));

	if ($delete) {
		header("Location: kategoriler.php?sonuc=yes");
	}else{
		header("Location: kategoriler.php?sonuc=no");
	}
	
}








































// YAZİ SİLME YERİ
$yazisil_id = $_GET["yazisil_id"];
if (isset($yazisil_id)) {
	$sil = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
	$sil->execute(array($yazisil_id));
	$eski_resim=$sil->fetch(PDO::FETCH_ASSOC);
	$eski_resim["yazi_foto"];

	unlink("../../img/yazilar/".$eski_resim["yazi_foto"]);


	$delete = $db->prepare("DELETE FROM yazilar WHERE yazi_id=?");
	$siliyoruz = $delete->execute(array($yazisil_id));


	if ($siliyoruz)
	{
		header("Location: yazilar.php?update=yes");
	}
	else
	{
		header("Location: yazilar.php?update=no");
	}
}










// admin güncelle düzenle

extract($_POST);
if (isset($admin_kadi_degistir)) {
	$admin_id=$_GET["admin_id"];

	if ($admin_kadi) {
		$adminguncelle = $db->prepare("UPDATE admin SET admin_kadi=? WHERE admin_id=?");
		$adminupdate= $adminguncelle->execute(array($admin_kadi,$admin_id));

		if ($adminupdate) {
			header("Location: profil.php?sonuc=yes");
		}else{
			header("Location: profil.php?sonuc=no");
		}
	}else{
		header("Location: profil.php?sonuc=bos");
	}
}















// ADMİN SİFRE İŞLEMLERİ

if (isset($admin_sifre_degistir)) {
	$admin_id = $_GET["admin_id"];

	$eski_sifre = md5($_POST["eski_sifre"]);
	$yeni_sifre = md5($_POST["yeni_sifre"]);

	$admin = $db->prepare("SELECT * FROM admin  WHERE admin_sifre=:admin_sifre");
	$admin->execute(array('admin_sifre' => $eski_sifre));

	$say=$admin->rowCount();


	if ($say==0) {
		header("Location: profil.php?sonuc=eskisifrehata&admin_id=$admin_id");
	}else{
		$adminguncelle = $db->prepare("UPDATE admin SET admin_sifre=? WHERE admin_id=?");
		$adminupdate = $adminguncelle->execute(array($yeni_sifre,$admin_id));

		if ($adminupdate) {
			header("Location: profil.php?sonuc=yes&admin_id=$admin_id");
		}else{
			header("Location: profil.php?sonuc=no&admin_id=$admin_id");
		}
	}
}





// giriş kısmı

if (isset($giris)) {
	$kadi =htmlspecialchars(trim($admin_kadi));
	$sifre =htmlspecialchars(trim(md5($admin_sifre)));
	
	if (!$kadi || !$sifre) {
		header("Location: login.php?giris=bos");
	}else{
		$query = $db->prepare("SELECT * FROM admin WHERE admin_kadi=? AND admin_sifre=?");
		$query->execute(array($kadi,$sifre));
		$admin_giris = $query->fetch(PDO::FETCH_ASSOC);

		if ($admin_giris) {
			$_SESSION["login"] = true;
			$_SESSION["admin_kadi"] = $admin_giris["admin_kadi"];
			$_SESSION["admin_id"] = $admin_giris["admin_id"];

			header("Location: index.php");
		}else{
			header("Location: login.php?giris=no");
		}
	}
}

?>