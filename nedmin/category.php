<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) SİLİNDİ-->


    <!-- Main content -->
    <section class="content">

        <?php if (isset($_GET['categoryInsert'])) {  ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Kategori Ekle</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['category_insert'])) {
                        $result = $db->insert('category', $_POST, [
                            "form_name" => "category_insert",
                            "file_name" => "category_file",
                            "slug" => "category_slug",
                            "title" => "category_title"
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
                            <label>Kategori İsmi</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="category_name" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kategori İkonu</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="category_icon" required="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Durum</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="category_status">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Öne Çıkar</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="category_highlight">
                                        <option value="1">Aktif</option>
                                        <option value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kategori Slug</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="category_slug" required="" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-primary" name="category_insert">Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php } elseif (isset($_GET['categoryUpdate'])) { ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Kategori Düzenleme</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <?php
                    if (isset($_POST['category_update'])) {
                        $result = $db->update('category', $_POST, [
                            "form_name" => "category_update",
                            "columns" => "category_id",
                            "slug" => "category_slug",
                            "title" => "category_title"
                        ]);

                        if ($result['status']) { ?>
                            <div class="alert alert-success">Kayıt Başarılı.</div>
                        <?php
                        } else { ?>
                            <div class="alert alert-danger">Kayıt Başarısız. <?php echo $result['error'] ?></div>
                    <?php
                        }
                    }
                    $sql = $db->wread("category", "category_id", $_GET['category_id']);
                    $row = $sql->fetch(PDO::FETCH_ASSOC);

                    ?>

                    <form method="POST" enctype="multipart/form-data">

                       
                    <div class="form-group">
                            <label>İsim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="category_name" required="" value="<?php echo $row['category_name'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>İkon</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="category_icon" required="" value="<?php echo $row['category_icon'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Durum</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="category_status">
                                        <option <?php echo $row['category_status'] == 1 ? 'selected' : '' ?> value="1">Aktif</option>
                                        <option <?php echo $row['category_status'] == 0 ? 'selected' : '' ?> value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Öne Çıkar</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <select class="form-control" name="category_highlight">
                                        <option <?php echo $row['category_highlight'] == 1 ? 'selected' : '' ?> value="1">Aktif</option>
                                        <option <?php echo $row['category_highlight'] == 0 ? 'selected' : '' ?> value="0">Pafis</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Slug</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="category_slug" required="" value="<?php echo $row['category_slug'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">

                        <div align="right" class="box-footer">
                            <button type="submit" class="btn btn-primary" name="category_update">Düzenlemeyi Kaydet</button>
                        </div>

                    </form>
                </div>
            </div>

        <?php } ?>

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Kategoriler</h3>
                <div align="right">
                    <a href="?categoryInsert=true"><button class="btn btn-success">Yeni Ekle</button></a>
                </div>

                <?php
                if (isset($_GET['categoryDelete'])) {

                    $result = $db->delete("category", "category_id", $_GET['category_id'], $_GET['file_delete']);

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
                            <th>ID</th>
                            <th>İsim</th>
                            <th>İkon</th>
                            <th>Durum</th>
                            <th>Öne Çıkar</th>
                            <th>Slug</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $db->read("category");
                        $say = 1;

                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row['category_id']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $row['category_icon']; ?></td>
                                <td><?php echo $row['category_status']; ?></td>
                                <td><?php echo $row['category_highlight']; ?></td>
                                <td><?php echo $row['category_slug']; ?></td>

                                <td align="center"><a href="?categoryUpdate=true&category_id=<?php echo $row['category_id']; ?>"><i class="fa fa-pencil-square"></i></a></td>
                                <td align="center"><a href="?categoryDelete=true&category_id=<?php echo $row['category_id']; ?>"><i class="fa fa-trash-o"></i></a></td>
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
