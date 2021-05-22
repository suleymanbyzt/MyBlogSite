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
                <i class="fa fa-cog- fa-fw"></i>Kategori Ekle
            </div>
            <div class="panel-body">
                <form action="islem.php" method="POST">
                    <div class="form-group">
                        <label>Kategori Adı</label>
                        <input class="form-control" name="kategori_tittle" placeholder="Kategorinizin Adını Giriniz.">
                    </div>
                    <button type="submit" name="kategori_ekle" class="btn btn-primary btn-block">Ekle</button>
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
