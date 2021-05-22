    <!-- HEADER BÖLÜMÜ -->
    <?php include 'header.php'; ?>

    <!-- SİDEBAR BÖLÜMÜ -->
    <?php include 'sidebar.php'; ?>

    <?php 
    $admin_id = 1;

    $admin = $db->prepare("SELECT * FROM admin WHERE admin_id=?");
    $admin->execute(array($admin_id));
    $admin_cek=$admin->fetch(PDO::FETCH_ASSOC);
    ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <br><br>

            <?php 
            extract($_GET);
            if ($sonuc == "bos") { ?>
               <div class="alert alert-warning">
                  <b>DİKKAT!</b> Lütfen Boş Alan Bırakmayanız...
              </div>
          <?php }elseif($sonuc=="no"){ ?>
             <div class="alert alert-danger">
                <b>HATA!</b> Güncelleme İşlemi Yapılırken Bir Hata Oluştu.
            </div>
        <?php }elseif($sonuc=="yes"){ ?> 
           <div class="alert alert-success">
              <b>TEBRİKLER</b> Güncelleme İşlemi Başarılı.
          </div>
      <?php } ?>

      <div class="row">
        <div class="col-lg-12">
            <br><br>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-edit fa-fw"></i>Admin Kullanıcı Adı Değiştir
                </div>
                <div class="panel-body">
                    <form action="islem.php?admin_id=<?php echo $admin_cek["admin_id"]; ?>" method="POST">
                        <div class="form-group">
                            <label>Kullanıcı Adı</label>
                            <input class="form-control" name="admin_kadi" value="<?php echo $admin_cek["admin_kadi"]; ?>">
                        </div>
                        <button type="submit" name="admin_kadi_degistir" class="btn btn-primary btn-block">Güncelle</button>
                    </form>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-edit fa-fw"></i>Admin Şifre Değiştir
                </div>
                <div class="panel-body">
                    <form action="islem.php?admin_id=<?php echo $admin_cek["admin_id"]; ?>" method="POST">
                        <div class="form-group">
                            <label>Eski Şifre</label>
                            <input class="form-control" name="eski_sifre">
                        </div>
                        <div class="form-group">
                            <label>Yeni Şifre</label>
                            <input class="form-control" name="yeni_sifre">
                        </div>
                        <button type="submit" name="admin_sifre_degistir" class="btn btn-primary btn-block">Güncelle</button>
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
