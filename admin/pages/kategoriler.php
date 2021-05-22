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

      <div class="panel panel-default">
        <div class="panel-heading">
          <i class="fa fa-list fa-fw mr-2">KATEGORİLER</i>
          <a href="kategori-ekle.php" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus mr-2"></i>Kategori Ekle</a>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kategori Adı</th>
                  <th>Yazı Sayısı</th>
                  <th>İşlemler</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $kategoriler = $db->prepare("SELECT * FROM  kategoriler ORDER BY kategori_id DESC");
                $kategoriler->execute();
                $kategori_cek = $kategoriler->fetchALL(PDO::FETCH_ASSOC);
                $kategori_say=$kategoriler->rowCount();

                if ($kategori_say) {
                  foreach ($kategori_cek as $row) {
                    $yazilar = $db->prepare("SELECT * FROM  yazilar WHERE yazi_kategori_id=?");
                    $yazilar->execute($row["kategori_id"]);
                    $yazilar->fetchALL(PDO::FETCH_ASSOC);
                    $yazi_say=$yazilar->rowCount();
                    ?>
                    <tr class="odd gradeX">
                      <td><?php echo $row["kategori_id"]; ?></td>
                      <td><?php echo $row["kategori_tittle"]; ?></td>
                      <td class="center"><?php echo $yazi_say; ?></td>
                      <td class="center">
                       <a href="kategori-duzenle.php?kategori_id=<?php echo $row["kategori_id"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Düzenle</button></a> 
                       <a href="islem.php?kategorisil_id=<?php echo $row["kategori_id"]; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Sil</button></a>
                     </td>
                   </tr>
                   <?php
                 }
               }
               ?>


             </tbody>
           </table>
         </div>
         <!-- /.table-responsive -->
       </div>
       <!-- /.panel-body -->
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
