<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) SİLİNDİ-->


    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Hakkımızda</h3>
                <hr>
            </div>
            <div class="box-body">

                <?php
                if (isset($_POST['about_update'])) {
                    $result = $db->update('about', $_POST, [
                        "form_name" => "about_update",
                        "columns" => "about_id"
                    ]);

                    if ($result['status']) { ?>
                        <div class="alert alert-success">Kayıt Başarılı.</div>
                    <?php
                    } else { ?>
                        <div class="alert alert-danger">Kayıt Başarısız. <?php echo $result['error'] ?></div>
                <?php
                    }
                }

                $sql = $db->wread("about", "1", 1);
                $row = $sql->fetch(PDO::FETCH_ASSOC);


                ?>

                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="about_title" required="" value="<?php echo $row['about_title'] ?>" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea id="about_content" name="about_content" class="form-control"><?php echo $row['about_content'] ?></textarea>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        CKEDITOR.replace('about_content', {
                            height: 300,
                            filebrowserUploadUrl: "upload.php"
                        });
                    </script>

                    <input type="hidden" name="about_id" value="<?php echo $row['about_id']; ?>">

                    <div align="right" class="box-footer">
                        <button type="submit" class="btn btn-primary" name="about_update">Düzenlemeyi Kaydet</button>
                    </div>

                </form>
                <p><?php echo $row['about_content'] ?></p>
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php require_once 'footer.php';
