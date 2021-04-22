<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) SİLİNDİ-->


    <!-- Main content -->
    <section class="content">

        <?php if (isset($_GET['settingsInsert'])) {  ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Ayarlar Ekle</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['settings_insert'])) {
                        $result = $db->insert('settings', $_POST, [
                            "form_name" => "settings_insert",
                            "password" => "settings_password",
                            "dir" => "settings",
                            "file_name" => "settings_file"
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
                                    <input type="file" name="settings_file" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Ayarlar Adı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="settings_username" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>İsim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="settings_name" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Soyisim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="settings_surname" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Parola</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="password" name="settings_password" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="settings_status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-primary" name="settings_insert">Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php } elseif (isset($_GET['settingsUpdate'])) {

        ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Ayarlar Düzenle</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['settings_update'])) {
                        $result = $db->update('settings', $_POST, [
                            "form_name" => "settings_update",
                            "dir" => "dimg/settings",
                            "file_name" => "settings_value",
                            "columns" => "settings_id",
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

                    $sql = $db->wread("settings", "settings_id", $_GET['settings_id']);
                    $row = $sql->fetch(PDO::FETCH_ASSOC);


                    ?>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Açıklama</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="settings_description" readonly="" required="" value="<?php echo $row['settings_description'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <?php if ($row['settings_type'] == "file") { ?>
                            <div class="form-group">
                                <label>Resim Seç</label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="file" name="settings_value" required="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="form-group">
                            <label>İçerik</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php if ($row['settings_type'] == "text") { ?>
                                        <input type="text" name="settings_value" value="<?php echo $row['settings_value'] ?>" required="" class="form-control">
                                    <?php } elseif ($row['settings_type'] == "textarea") { ?>
                                        <textarea class="form-control" name="settings_value"><?php echo $row['settings_value'] ?></textarea>
                                    <?php } elseif ($row['settings_type'] == "ckeditor") { ?>
                                        <textarea id="editor1" class="form-control" name="settings_value"><?php echo $row['settings_value'] ?></textarea>
                                    <?php } elseif ($row['settings_type'] == "file") { ?>
                                        <a href="dimg/settings/<?php echo $row['settings_value'] ?>" target="_blank"><img width="200" src="dimg/settings/<?php echo $row['settings_value'] ?>"></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                        <!-- CKEditör -->
                        <script>
                            CKEDITOR.replace('editor1');
                        </script>

                        <input type="hidden" name="settings_id" value="<?php echo $row['settings_id'] ?>">
                        <input type="hidden" name="delete_image" value="<?php echo $row['settings_value'] ?>">

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-primary" name="settings_update">Düzenlemeyi Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php } ?>

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Ayarlar</h3>
                <div align="right">
                    <a href="?settingsInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
                </div>

                <?php
                if (isset($_GET['settingsDelete'])) {

                    $result = $db->delete("settings", "settings_id", $_GET['settings_id'], $_GET['file_delete']);

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
                            <th>Ayar Adı</th>
                            <th>İçerik</th>
                            <th>Anahtar</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $db->read("settings");
                        $say = 1;

                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row['settings_description']; ?></td>
                                <td><?php 
                                if ($row['settings_type'] == 'file') { ?>
                                    <img width="125" src="dimg/settings/<?php echo $row['settings_value'] ?>">
                                <?php 
                                }else {
                                    echo $row['settings_value'];
                                }
                                ?></td>
                                <td><?php echo $row['settings_key']; ?></td>
                                <td align="center"><a href="?settingsUpdate=true&settings_id=<?php echo $row['settings_id']; ?>"><i class="fa fa-pencil-square"></i></a></td>
                                <td align="center"><a href="?settingsDelete=true&settings_id=<?php echo $row['settings_id']; ?>&file_delete=<?php echo $row['settings_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
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
