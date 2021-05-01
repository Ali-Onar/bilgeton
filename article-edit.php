<?php require_once 'header.php';

if (empty($_SESSION['users'])) {
    Header("Location:404.php");
    exit;
}

$sqlBlogs = $db->read("blogs");
$rowBlogs = $sqlBlogs->fetchAll(PDO::FETCH_ASSOC);

$blogs_slugs = [];
foreach ($rowBlogs as $key) {
    array_push($blogs_slugs, $key['blogs_slug']);
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
                            <h4><i class="ti-medall-alt"></i> Yazı Düzenle</h4>
                        </div>

                        <div class="Reveal-other-body">

                            <?php
                            if (isset($_POST['blogs_update'])) {
                                $result = $db->update('blogs', $_POST, [
                                    "form_name" => "blogs_update",
                                    "dir" => "nedmin/dimg/blogs",
                                    "file_name" => "blogs_file",
                                    "columns" => "blogs_id",
                                    "file_delete" => "delete_image",
                                    "slug" => "blogs_slug",
                                    "title" => "blogs_title"
                                ], $blogs_slugs);

                                if ($result['status']) { ?>
                                    <div class="alert alert-success">Kayıt Başarılı.</div>
                                <?php
                                } else { ?>
                                    <div class="alert alert-danger">Kayıt Başarısız. <?php echo $result['error'] ?></div>
                            <?php
                                }
                            }
                            $sql = $db->wread("blogs", "blogs_id", $_GET['blogs_id']);
                            $row = $sql->fetch(PDO::FETCH_ASSOC);

                            ?>

                            <form method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Yazı Resmi*</label>
                                    <img src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" alt="">
                                </div>

                                <div class="form-group">
                                    <label>Yazı Resmi Değiştir*</label>
                                    <input type="file" class="form-control" name="blogs_file">
                                </div>

                                <div class="form-group">
                                    <label>Yazı Başlığı*</label>
                                    <input class="form-control" required="" type="text" value="<?php echo $row['blogs_title'] ?>" name="blogs_title">
                                </div>

                                <div class="form-group">
                                    <label>İçerik</label>
                                    <textarea id="blogs_content" class="form-control" name="blogs_content"><?php echo $row['blogs_content'] ?></textarea>
                                </div>

                                <!-- <div class="form-group">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select id="list-category" required="" class="form-control" name="category_id">
                                            <option value="">&nbsp;</option>
                                            <option value="1">Cafe & Restaurant</option>
                                            <option value="2">Businesses</option>
                                            <option value="3">Education</option>
                                            <option value="4">Sport & Gym</option>
                                            <option value="5">Hotel & Villa</option>
                                        </select>
                                    </div>
                                </div> -->

                                <div class="form-group">
                                    <label>Etiket</label>
                                    <input class="form-control" required="" type="text" value="<?php echo $row['blogs_tag'] ?>" name="blogs_tag" placeholder="Etiketleri virgül ile ayırınız...">
                                </div>


                                <input type="hidden" name="blogs_id" value="<?php echo $row['blogs_id']; ?>">
                                <input type="hidden" name="delete_image" value="<?php echo $row['blogs_file']; ?>">
                                <input type="hidden" name="users_id" value="<?php echo $_SESSION['users']['users_id'] ?>">

                                <button class="btn btn-theme" type="submit" name="blogs_update">Yazı Düzenle</button>

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