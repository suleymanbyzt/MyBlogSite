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
        <?php } ?>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-cog- fa-fw"></i>Genel Ayarlar
            </div>
            <div class="panel-body">
                <form action="islem.php" method="POST">
                   <div class="form-group">
                    <label>Site Tittle</label>
                    <input class="form-control" name="site_tittle" value="<?php echo $ayarcek["site_tittle"];  ?>">
                </div>
                <div class="form-group">
                    <label>Site Url</label>
                    <input class="form-control" name="site_url" value="<?php echo $ayarcek["site_url"];  ?>">
                </div>
                <div class="form-group">
                    <label>Site Description</label>
                    <input class="form-control" name="site_desc" value="<?php echo $ayarcek["site_desc"];  ?>">
                </div>
                <div class="form-group">
                    <label>Site Keywords</label>
                    <input class="form-control" name="site_keyw" value="<?php echo $ayarcek["site_keyw"];  ?>">
                </div>
                <button type="submit" name="genel_ayarlar" class="btn btn-primary btn-block">Güncelle</button>
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
