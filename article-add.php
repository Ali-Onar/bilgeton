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
                                    "dir" => "blogs",
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

                            <form method="POST">
                                <div class="form-group">
                                    <label>Yazı Başlığı*</label>
                                    <input class="form-control" type="text" name="blogs_title">
                                </div>

                                <div class="form-group">
                                    <label>Yazı Resmi*</label>
                                    <input class="form-control" type="file" name="blogs_file">
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select id="list-category" class="form-control" name="category_id">
                                            <option value="">&nbsp;</option>
                                            <option value="1">Cafe & Restaurant</option>
                                            <option value="2">Businesses</option>
                                            <option value="3">Education</option>
                                            <option value="4">Sport & Gym</option>
                                            <option value="5">Hotel & Villa</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Etiket</label>
                                    <input class="form-control" type="text" name="blogs_tag" placeholder="Etiketleri virgül ile ayırınız...">
                                </div>
                                <div class="form-group">
                                    <label>İçerik</label>
                                    <textarea class="form-control" name="blogs_content"></textarea>
                                </div>
                                <input type="hidden" name="users_id" value="<?php echo $_SESSION['users']['users_id'] ?>">
                                <button class="btn btn-theme" type="submit" name="blogs_insert">Yazı Ekle</button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'footer.php'; ?>