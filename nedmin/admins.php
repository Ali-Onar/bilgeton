<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) SİLİNDİ-->


    <!-- Main content -->
    <section class="content">

        <?php if (isset($_GET['adminsInsert'])) {  ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Yönetici Ekle</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['admins_insert'])) {
                        $result = $db->insert('admins', $_POST, [
                            "form_name" => "admins_insert",
                            "password" => "admins_password",
                            "dir" => "admins",
                            "file_name" => "admins_file"
                        ]);

                        if ($result['status']) { ?>
                            <div class="alert alert-success">Kayıt Başarılı.</div>
                        <?php
                        } else { ?>
                            <div class="alert alert-danger">Kayıt Başarısız. <?php echo $result['error'] ?></div>
                    <?php
                        }
                    }
                    ?>

                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="admins_file" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Yönetici Adı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="admins_username" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>İsim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="admins_name" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Soyisim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="admins_surname" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Parola</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="password" name="admins_password" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="admins_status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-primary" name="admins_insert">Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php } elseif (isset($_GET['adminsUpdate'])) {  ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Yönetici Düzenle</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="admins_file" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Yönetici Adı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="admins_username" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>İsim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="admins_name" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Soyisim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="admins_surname" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Parola</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="password" name="admins_password" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="admins_status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-primary" name="admins_insert">Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php } ?>

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Yöneticiler</h3>
                <div align="right">
                    <a href="?adminsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
                </div>
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
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $db->read("admins");
                        $say = 1;

                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $say++; ?></td>
                                <td><?php echo $row['admins_username']; ?></td>
                                <td><?php echo $row['admins_name'] . " " . $row['admins_surname']; ?></td>
                                <td><?php
                                    if ($row['admins_status'] == 1) {
                                        echo "aktif";
                                    } else {
                                        echo "pasif";
                                    }
                                    ?></td>
                                <td align="center"><a href="?adminsUpdate=true&admins_id=<?php echo $row['admins_id']; ?>"><i class="fa fa-pencil-square"></i></a></td>
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
