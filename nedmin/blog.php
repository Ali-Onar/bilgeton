<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) SİLİNDİ-->


    <!-- Main content -->
    <section class="content">

        <?php if (isset($_GET['blogsDetail'])) { ?>

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Yazı Düzenleme</h3>
                    <hr>
                </div>
                <div class="box-body">

                    <?php

                    $sql = $db->wread("blogs", "blogs_id", $_GET['blogs_id']);
                    $row = $sql->fetch(PDO::FETCH_ASSOC);

                    ?>

                    <form method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>Resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img src="dimg/blogs/<?php echo $row['blogs_file'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Yazı Başlığı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="blogs_title" required="" value="<?php echo $row['blogs_title'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kullanıcı</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" name="users_id" required="" value="<?php echo $row['users_id'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="test" name="category_id" value="<?php echo $row['category_id'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>İçerik</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <textarea id="blogs_content" name="blogs_content" class="form-control"><?php echo $row['blogs_content'] ?></textarea>
                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                            CKEDITOR.replace('blogs_content', {
                                height: 300,
                                filebrowserUploadUrl: "netting/upload.php"
                            });
                        </script>

                        <div class="form-group">
                            <label>Etiketler</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="test" name="blogs_tag" value="<?php echo $row['blogs_tag'] ?>" class="form-control">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        <?php } ?>

        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Yazılar</h3>

                <?php
                if (isset($_GET['blogsDelete'])) {

                    $result = $db->delete("blogs", "blogs_id", $_GET['blogs_id'], $_GET['file_delete']);

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
                            <th>Yazı Başlığı</th>
                            <th>Kullanıcı</th>
                            <th>Kategori</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = $db->read("blogs");
                        $say = 1;

                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?php echo $row['blogs_title']; ?></td>
                                <td><?php echo $row['users_id']; ?></td>
                                <td><?php echo $row['category_id']; ?></td>
                                <td align="center"><a href="?blogsDetail=true&blogs_id=<?php echo $row['blogs_id']; ?>"><i class="fa fa-pencil-square"></i></a></td>
                                <td align="center"><a href="?blogsDelete=true&blogs_id=<?php echo $row['blogs_id']; ?>&file_delete=<?php echo $row['blogs_file'] ?>"><i class="fa fa-trash-o"></i></a></td>
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
