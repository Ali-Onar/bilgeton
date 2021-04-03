<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) SİLİNDİ-->


    <!-- Main content -->
    <section class="content">

        <?php if (isset($_GET['usersInsert'])) {  ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Kullanıcı Ekle</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['users_insert'])) {
                        $result = $db->insert('users', $_POST, [
                            "form_name" => "users_insert",
                            "password" => "users_password",
                            "dir" => "dimg/users",
                            "file_name" => "users_file"
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
                                    <input type="file" name="users_file" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mail Adresi</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="users_mail" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Adınız</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="users_name" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Parola</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="password" name="users_password" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="users_status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-primary" name="users_insert">Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php } elseif (isset($_GET['usersUpdate'])) { ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Kullanıcı Düzenleme</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['users_update'])) {
                        $result = $db->update('users', $_POST, [
                            "form_name" => "users_update",
                            "password" => "users_password",
                            "dir" => "dimg/users",
                            "file_name" => "users_file",
                            "columns" => "users_id",
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
                    $sql = $db->wread("users", "users_id", $_GET['users_id']);
                    $row = $sql->fetch(PDO::FETCH_ASSOC);

                    ?>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img src="dimg/users/<?php echo $row['users_file'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="file" name="users_file" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Mail Adresi</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="users_mail" required="" value="<?php echo $row['users_mail'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>İsim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="users_name" required="" value="<?php echo $row['users_name'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Parola</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="password" name="users_password" value="<?php echo $row['users_password'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="users_status">
                                        <option <?php echo $row['users_status'] == 1 ? 'selected' : '' ?> value="1">Aktif</option>
                                        <option <?php echo $row['users_status'] == 0 ? 'selected' : '' ?> value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="users_id" value="<?php echo $row['users_id']; ?>">
                        <input type="hidden" name="delete_image" value="<?php echo $row['users_file']; ?>">

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-primary" name="users_update">Düzenlemeyi Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php } ?>

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Kullanıcılar</h3>
                <div align="right">
                    <a href="?usersInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
                </div>

                <?php
                if (isset($_GET['usersDelete'])) {

                    $result = $db->delete("users", "users_id", $_GET['users_id'], $_GET['file_delete']);

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
                            <th>Mail</th>
                            <th>Ad Soyad</th>
                            <th>Durum</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $db->read("users");
                        $say = 1;

                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $say++; ?></td>
                                <td><?php echo $row['users_mail']; ?></td>
                                <td><?php echo $row['users_name']; ?></td>
                                <td><?php
                                    if ($row['users_status'] == 1) {
                                        echo "aktif";
                                    } else {
                                        echo "pasif";
                                    }
                                    ?></td>
                                <td align="center"><a href="?usersUpdate=true&users_id=<?php echo $row['users_id']; ?>"><i class="fa fa-pencil-square"></i></a></td>
                                <td align="center"><a href="?usersDelete=true&users_id=<?php echo $row['users_id']; ?>&file_delete=<?php echo $row['users_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
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
