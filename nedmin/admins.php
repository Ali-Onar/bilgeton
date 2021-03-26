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

        <?php } elseif (isset($_GET['adminsUpdate'])) {

        ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Yönetici Düzenle</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['admins_update'])) {
                        $result = $db->update('admins', $_POST, [
                            "form_name" => "admins_update",
                            "password" => "admins_password",
                            "dir" => "admins",
                            "file_name" => "admins_file",
                            "columns" => "admins_id",
                            "file_delete" => "delete_image"
                        ]);

                        if ($result['status']) { ?>
                            <div class="alert alert-success">Kayıt Başarılı.</div>
                        <?php
                        } else { ?>
                            <div class="alert alert-danger">Kayıt Başarısız. <?php echo $result['error'] ?></div>
                    <?php
                        }
                    }

                    $sql = $db->wread("admins", "admins_id", $_GET['admins_id']);
                    $row = $sql->fetch(PDO::FETCH_ASSOC);


                    ?>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Yüklü Resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img src="dimg/admins/<?php echo $row['admins_file'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="admins_file" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Yönetici Adı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="admins_username" required="" value="<?php echo $row['admins_username'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>İsim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="admins_name" required="" value="<?php echo $row['admins_name'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Soyisim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="admins_surname" required="" value="<?php echo $row['admins_surname'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Parola</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="password" name="admins_password" value="<?php echo $row['admins_password'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="admins_status">
                                        <option <?php echo $row['admins_status'] == 1 ? 'selected' : '' ?> value="1">Aktif</option>
                                        <option <?php echo $row['admins_status'] == 0 ? 'selected' : '' ?> value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="admins_id" value="<?php echo $row['admins_id']; ?>">
                        <input type="hidden" name="delete_image" value="<?php echo $row['admins_file']; ?>">

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-primary" name="admins_update">Düzenlemeyi Kaydet</button>
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

                <?php
                if (isset($_GET['adminsDelete'])) {

                    $result = $db->delete("admins", "admins_id", $_GET['admins_id'], $_GET['file_delete']);

                    if ($result['status']) { ?>
                        <div class="alert alert-success">Silme Başarılı.</div>
                    <?php
                    } else { ?>
                        <div class="alert alert-danger">Silme Başarısız. <?php echo $result['error'] ?></div>
                <?php
                    }
                }
                ?>

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
                                <td align="center"><a href="?adminsDelete=true&admins_id=<?php echo $row['admins_id']; ?>&file_delete=<?php echo $row['admins_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
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
