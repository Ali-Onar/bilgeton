<?php

require_once 'header.php';

if (empty($_SESSION['users'])) {
    Header("Location:404.php");
    exit;
}

?>
<!-- ============================ Dashboard Start ================================== -->
<section class="gray">
    <div class="container-fluid">
        <div class="row">

            <?php require_once 'profile-sidebar.php'; ?>

            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="dashboard-wraper">

                    <?php
                    if (isset($_POST['users_update'])) {
                        $result = $db->orderUpdate('users', $_POST, [
                            "form_name" => "users_update",
                            "columns" => "users_id"
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
                        <!-- Basic Information -->
                        <div class="form-submit">
                            <h4>Hesabım</h4>
                            <div class="submit-section">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>İsim</label>
                                        <input type="text" class="form-control" name="users_name" value="<?php echo $rowUsers['users_name'] ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="users_mail" value="<?php echo $rowUsers['users_mail'] ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Ünvan</label>
                                        <input type="text" class="form-control" name="users_title" value="<?php echo $rowUsers['users_title'] ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Lokasyon</label>
                                        <input type="text" class="form-control" name="users_location" value="<?php echo $rowUsers['users_location'] ?>">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Bio</label>
                                        <textarea class="form-control" name="users_bio"><?php echo $rowUsers['users_bio'] ?></textarea>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-submit">
                            <h4>Sosyal Hesaplar</h4>
                            <div class="submit-section">
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control" name="users_facebook" value="<?php echo $rowUsers['users_facebook'] ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control" name="users_twitter" value="<?php echo $rowUsers['users_twitter'] ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>İnstagram</label>
                                        <input type="text" class="form-control" name="users_instagram" value="<?php echo $rowUsers['users_instagram'] ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>LinkedIn</label>
                                        <input type="text" class="form-control" name="users_linkedin" value="<?php echo $rowUsers['users_linkedin'] ?>">
                                    </div>

                                    <input type="hidden" name="users_id" value="<?php echo $rowUsers['users_id'] ?>">

                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="btn btn-theme" type="submit" name="users_update">Değişiklikleri Kaydet</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Dashboard End ================================== -->
<?php require_once 'footer.php'; ?>