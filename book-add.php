<?php require_once 'header.php';

if (empty($_SESSION['users'])) {
    Header("Location:404.php");
    exit;
}

?>

<section class="gray">
    <div class="container-fluid">
        <div class="row">
            <?php require_once 'profile-sidebar.php'; ?>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="add-listing-form form-submit">

                    <!-- general information -->
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h4><i class="ti-medall-alt"></i> Kitap Ekle</h4>
                        </div>

                        <div class="Reveal-other-body">

                            <?php
                            if (isset($_POST['books_insert'])) {
                                $result = $db->insert('books', $_POST, [
                                    "form_name" => "books_insert",
                                    "file_name" => "books_file",

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
                                    <label>Kitap İsmi*</label>
                                    <input class="form-control" required="" type="text" name="books_name">
                                </div>

                                <div class="form-group">
                                    <label>Bitiş Tarihi*</label>
                                    <input class="form-control" required="" type="date" name="books_time">
                                </div>

                                <input type="hidden" name="users_id" value="<?php echo $_SESSION['users']['users_id'] ?>">
                                <button class="btn btn-theme" type="submit" name="books_insert">Kitap Ekle</button>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'footer.php'; ?>