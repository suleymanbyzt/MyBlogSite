    <!-- HEADER BÖLÜMÜ -->
    <?php include 'header.php'; ?>

    <!-- SİDEBAR BÖLÜMÜ -->
    <?php include 'sidebar.php'; ?>

    <?php 
    $yazi_id = $_GET["yazi_id"];
    $yazilar = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
    $yazilar->execute(array($yazi_id));
    $yazicek=$yazilar->fetch(PDO::FETCH_ASSOC);
    ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <br><br>

        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-cog- fa-fw"></i>Yazı Düzenle
            </div>
            <div class="panel-body">
                <form action="islem.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Fotoğraf Yükle</label>
                        <input type="file" class="form-control" name="yazi_foto">
                    </div>
                    <div class="form-group">
                        <label>Yazının Başlığı</label>
                        <input class="form-control" name="yazi_tittle" placeholder="Yazınızın Başlığını Giriniz.">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <select name="yazi_kategori" class="form-control">
                            <?php
                            $kategoriler = $db->prepare("SELECT * FROM kategoriler");
                            $kategoriler->execute();
                            $kategori_cek = $kategoriler->fetchALL(PDO::FETCH_ASSOC);
                            foreach ($kategori_cek as $row) { ?>
                                <option value="<?php echo $row["kategori_id"];?>"><?php echo $row["kategori_tittle"]; ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>İçerik</label>
                        <textarea name="yazi_icerik" placeholder="İçeriğinizi buraya giriniz..." class="ckeditor"></textarea>
                    </div>
                    <button type="submit" name="yazi_ekle" class="btn btn-primary btn-block">Ekle</button>
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
