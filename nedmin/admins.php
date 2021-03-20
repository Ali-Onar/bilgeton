<?php
require_once 'header.php';
require_once 'sidebar.php';
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) SİLİNDİ-->


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Yöneticiler</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kullanıcı Adı</th>
                            <th>Ad Soyad</th>
                            <th>Durum</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $sql = $db->read("admins");
                          $say = 1;

                          while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td><?php echo $say++; ?></td>
                            <td><?php echo $row['admins_username']; ?></td>
                            <td><?php echo $row['admins_name']." ".$row['admins_surname']; ?></td>
                            <td><?php 
                            if ($row['admins_status'] == 1) {
                                echo "aktif";
                            } else {
                                echo "pasif";
                            }
                            ?></td>
                            <td align="center"><i class="fa fa-pencil-square"></i></td>
                            <td align="center"><i class="fa fa-trash-o"></i></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once 'footer.php';
