    <!-- HEADER BÖLÜMÜ -->
    <?php include 'header.php'; ?>
    <?php
    error_reporting(0);
    ?>
    <!-- SİDEBAR BÖLÜMÜ -->
    <?php include 'sidebar.php'; ?>

    <?php 
    $ayarlar = $db->prepare("SELECT * FROM ayarlar");
    $ayarlar->execute();
    $ayarcek=$ayarlar->fetch(PDO::FETCH_ASSOC);
    ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <?php 
                    extract($_GET);
                    if ($update == "bos") { ?>
                     <div class="alert alert-warning">
                        <b>DİKKAT!</b> Lütfen Boş Alan Bırakmayanız...
                    </div>
                <?php }elseif($update=="no"){ ?>
                   <div class="alert alert-danger">
                    <b>HATA!</b> Güncelleme İşlemi Yapılırken Bir Hata Oluştu.
                </div>
            <?php }elseif($update=="yes"){ ?>
               <div class="alert alert-success">
                <b>TEBRİKLER</b> Güncelleme İşlemi Başarılı.
            </div>
        <?php }elseif($update=="gecersizuzanti"){ ?>
           <div class="alert alert-danger">
            <b>Dikkat!</b> Sadece JPG,PNG VE JPEG uzantılı resimleri yükleyebilirsiniz.
        </div>
    <?php }
    elseif($update=="buyuk"){ ?>
       <div class="alert alert-danger">
        <b>Dikkat!</b> Sadece 1 MB büyüklüğünde resim yükleyebilirsiniz.
    </div>
<?php } ?>


<!-- PANEL 1 LOGO -->

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-cog- fa-fw"></i>Site Logo
    </div>
    <div class="panel-body">
        <form action="islem.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Şuanki Logo</label>
                <img src="../../img/<?php echo $ayarcek["site_logo"]; ?>" alt="Süleyman Bayazit"> <br> <br>
            </div>
            <div class="form-group">
                <label>Site Logo</label>
                <input class="form-control" type="file" name="site_logo">
            </div>
            <button type="submit" name="logo" class="btn btn-primary btn-block">Güncelle</button>
        </form>
    </div>
</div>



<!-- PANEL 2 FAVİCON -->


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-cog- fa-fw"></i>Site Favicon
    </div>
    <div class="panel-body">
        <form action="islem.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Şuanki Favicon</label>
                <img src="../../img/<?php echo $ayarcek["site_favicon"]; ?>" alt="Süleyman Bayazit"> <br> <br>
            </div>
            <div class="form-group">
                <label>Site Favicon</label>
                <input class="form-control" type="file" name="site_favicon">
            </div>
            <button type="submit" name="logo" class="btn btn-primary btn-block">Güncelle</button>
        </form>
    </div>
</div>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<?php include 'footer.php'; ?>
