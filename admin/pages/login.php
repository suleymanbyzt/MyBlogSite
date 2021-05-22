<?php 

include '../../sistem/baglan.php';
?>
<?php
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Süleyman Bayazit / Login Paneli</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-sign-in"></i> Lütfen Giriş Yapınız</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="islem.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Kullanıcı Adı" type="text" name="admin_kadi" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Şifre" name="admin_sifre" type="password">
                                </div>
                                <button type="submit" name="giris" class="btn btn-lg btn-primary btn-block">Giriş Yap</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <?php 
                extract($_GET);
                if ($giris == "bos") { ?>
                   <div class="alert alert-warning"><i class="fa fa-warning"></i> Boş alan bırakmayınız !</div>
               <?php  }elseif ($giris=="no") { ?>
                  <div class="alert alert-danger"><i class="fa fa-times-circle"></i> Giriş İşlemi Başarısız!</div>
              <?php }  ?>


          </div>
      </div>
  </div>

  <!-- jQuery -->
  <script src="../js/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="../js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="../js/metisMenu.min.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="../js/startmin.js"></script>

</body>
</html>
