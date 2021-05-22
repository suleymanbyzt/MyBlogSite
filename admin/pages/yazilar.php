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
                <i class="fa fa-list fa-fw">Yazılarım</i>
                <a href="yazi-ekle.php" class="btn btn-xs btn-primary pull-right"><i class="fa fa-plus mr-2"></i>Yazı Ekle</a>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Yazı ID</th>
                                <th>Fotoğraf</th>
                                <th>Başlık</th>
                                <th>Kategori</th>
                                <th>Okunma</th>
                                <th>Tarih</th>
                                <th>İşlemler</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $yazilar = $db->prepare("SELECT * FROM yazilar
                                INNER JOIN  kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id
                                ORDER BY yazi_id DESC");
                            $yazilar->execute();
                            $yazi_cek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
                            $yazi_say=$yazilar->rowCount();

                            if ($yazi_say) {
                                foreach ($yazi_cek as $row) {
                                    ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row["yazi_id"]; ?></td>
                                        <td><img width="100" src="../../img/yazilar/<?php echo $row["yazi_foto"]; ?>" alt="<?php echo $row["yazi_tittle"]; ?>"></td>
                                        <td><?php echo $row["yazi_tittle"]; ?></td>
                                        <td class="center"><?php echo $row["kategori_tittle"]; ?></td>
                                        <td class="center"><?php echo $row["yazi_okunma"]; ?></td>
                                        <td class="center"><?php echo $row["yazi_tarih"]; ?></td>
                                        <td class="center">
                                           <a href="yazi-duzenle.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>Düzenle</button></a> 
                                           <a href="islem.php?yazisil_id=<?php echo $row["yazi_id"]; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>Sil</button></a>
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
