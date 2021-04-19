<?php require_once 'header.php';

if (empty($_SESSION['users'])) {
    Header("Location:404.php");
    exit;
}

?>

<section class="gray">
    <div class="container">

        <div class="row justify-content-md-center">
            <div class="col-lg-10 col-md-10 col-sm-12">
                <div class="add-listing-form form-submit">

                    <!-- general information -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="ti-medall-alt"></i> Yazı Ekle</h4>
                        </div>

                        <div class="Reveal-other-body">

                            <?php
                            if (isset($_POST['blogs_insert'])) {
                                $result = $db->insert('blogs', $_POST, [
                                    "form_name" => "blogs_insert",
                                    "dir" => "nedmin/dimg/blogs",
                                    "file_name" => "blogs_file",
                                    "slug" => "blogs_slug",
                                    "title" => "blogs_title"

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
                                    <label>Yazı Resmi*</label>
                                    <input type="file" class="form-control" required="" name="blogs_file">
                                </div>

                                <div class="form-group">
                                    <label>Yazı Başlığı*</label>
                                    <input class="form-control" required="" type="text" name="blogs_title">
                                </div>
                                <div class="form-group">
                                    <label>İçerik</label>
                                    <textarea id="blogs_content" class="form-control" name="blogs_content"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Kategori*</label>
                                        <select id="list-category" required="" class="form-control" name="category_id">
                                            <?php

                                            $stmtCategory = $db->qsql("SELECT * FROM category order by category_id ASC");
                                            $stmtCategory->execute();

                                            while ($rowCategory = $stmtCategory->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $rowCategory['category_id'] ?>"><?php echo $rowCategory['category_name'] ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Etiket</label>
                                    <input class="form-control" required="" type="text" name="blogs_tag" placeholder="Etiketleri virgül ile ayırınız...">
                                </div>


                                <input type="hidden" name="users_id" value="<?php echo $_SESSION['users']['users_id'] ?>">
                                <button class="btn btn-theme" type="submit" name="blogs_insert">Yazı Ekle</button>

                            </form>

                            <script type="text/javascript">
                                CKEDITOR.replace('blogs_content', {
                                    height: 300,
                                    filebrowserUploadUrl: "inc/article-upload.php"
                                });
                            </script>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'footer.php'; ?>