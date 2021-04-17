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
                            <h4>Profil Fotoğrafı</h4>
                        </div>

                        <div class="Reveal-other-body">

                            <?php
                            if (isset($_POST['users_update'])) {
                                $result = $db->update('users', $_POST, [
                                    "form_name" => "users_update",
                                    "columns" => "users_id",
                                    "dir" => "nedmin/dimg/users",
                                    "file_name" => "users_file",
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
                            $sqlUsers = $db->wread("users", "users_id", $_SESSION['users']['users_id']);
                            $rowUsers = $sqlUsers->fetch(PDO::FETCH_ASSOC);

                            ?>

                            <form method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Aktif Profil Fotoğrafı</label>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <img width="200" src="nedmin/dimg/users/<?php echo $rowUsers['users_file'] ?>" class="img-fluid avater" alt="">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Profil Fotoğrafını Değiştir</label>
                                    <input class="form-control" required="" type="file" name="users_file">
                                </div>

                                <input type="hidden" name="users_id" value="<?php echo $rowUsers['users_id'] ?>">
                                <input type="hidden" name="delete_image" value="<?php echo $rowUsers['users_file']; ?>">

                                <button class="btn btn-theme" type="submit" name="users_update">Kaydet</button>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'footer.php'; ?>