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
                <div class="dashboard-wraper">

                    <!-- Basic Information -->
                    <div class="form-submit">
                        <h4>Parolanı Değiştir</h4>
                        <div class="submit-section">


                            <?php
                            // Form işlemleri
                            if (isset($_POST['change_password'])) {

                                $result = $db->changePassword(
                                    htmlspecialchars($_POST['users_password']),
                                    htmlspecialchars($_POST['users_password_new']),
                                    htmlspecialchars($_POST['users_password_new2'])
                                );

                                if ($result['status']) { ?>
                                    <div class="alert alert-success">Kayıt Başarılı.</div>
                                <?php
                                } else { ?>
                                    <div class="alert alert-danger"><?php echo $result['error']; ?></div>
                            <?php
                                }
                            }
                            ?>

                            <form method="POST">
                                <div class="form-row">
                                    <div class="form-group col-lg-12 col-md-6">
                                        <label>Eski Parola</label>
                                        <input type="password" name="users_password" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Yeni Parola</label>
                                        <input type="password" name="users_password_new" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Yeni Parolayı Doğrula</label>
                                        <input type="password" name="users_password_new2" class="form-control">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="btn btn-theme" type="submit" name="change_password">Kaydet</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'footer.php'; ?>