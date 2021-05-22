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
                    if ($update=="bos") { ?>
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
        <?php } ?>
   

    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-cog- fa-fw"></i>Sosyal Medya Linkleri
        </div>
        <div class="panel-body">
            <form action="islem.php" method="POST">
                <a class="btn btn-block btn-social btn-instagram">
                    <i class="fa fa-instagram"></i> <input type="text" class="form-control" name="site_instagram" value="<?php echo $ayarcek["site_instagram"];  ?>">
                </a>
                <a class="btn btn-block btn-social btn-linkedin">
                    <i class="fa fa-linkedin"></i> <input type="text" class="form-control" name="site_linkedin" value="<?php echo $ayarcek["site_linkedin"];  ?>">
                </a>
                <a class="btn btn-block btn-social btn-github">
                    <i class="fa fa-github"></i> <input type="text" class="form-control" name="site_github" value="<?php echo $ayarcek["site_github"];  ?>">
                </a>
                <a class="btn btn-block btn-social btn-twitter">
                    <i class="fa fa-twitter"></i> <input type="text" class="form-control" name="site_twitter" value="<?php echo $ayarcek["site_twitter"];  ?>">
                </a>
                <a class="btn btn-block btn-social btn-youtube">
                    <i class="fa fa-youtube"></i> <input type="text" class="form-control" name="site_youtube" value="<?php echo $ayarcek["site_youtube"];  ?>">
                </a>
                <button type="submit" name="sosyal_medya" class="btn btn-primary btn-block">Güncelle</button>
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
