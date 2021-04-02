<?php require_once 'header.php';


# Giriş yapılmışsa login'e giremesin.
// if (isset($_SESSION['users'])) {
//   Header('Location: index.php');
//   exit;
// }

require_once 'nedmin/netting/class.crud.php';
$db = new CRUD();

?>


<!-- ============================ Login Start================================== -->
<section class="gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
                <div class="loving-modern-login">

                    <div class="text-center mb-4"><img width="100" src="nedmin/dimg/settings/<?php echo $settings['logo'] ?>" class="img-fluid" alt="" /></div>
                    <div class="row main_login_form">
                        <div class="login_form_dm">

                            <?php
                            // Form işlemleri
                            if (isset($_POST['users_login'])) {

                                $result = $db->usersLogin(htmlspecialchars($_POST['users_mail']), htmlspecialchars($_POST['users_password']));

                                if ($result['status']) {
                                    header('Location: index.php');
                                    exit;
                                } else {
                            ?>
                                    <div class="alert alert-danger">
                                        Kullanıcı adı veya parola hatalı!
                                    </div>
                            <?php
                                }
                            }
                            ?>


                            <form id="edd_login_form" class="edd_form" method="post">
                                <fieldset>
                                    <p class="edd-login-username">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="users_mail" placeholder="Email adresiniz">
                                    </p>
                                    <p class="edd-login-password">
                                        <label>Parola</label>
                                        <input class="form-control" type="password" name="users_password" placeholder="*******">
                                    </p>
                                    <p class="edd-login-remember">
                                        <input id="remember" class="checkbox-custom" name="remember" type="checkbox">
                                        <label for="remember" class="checkbox-custom-label">Beni Hatırla!</label>
                                    </p>
                                    <p class="edd-lost-password">
                                        <a href="#">Parolamı Unuttum!</a>
                                    </p>
                                    <p class="edd-login-submit">
                                        <input type="submit" name="users_login" class="btn btn-md btn-theme full-width" value="Login">
                                    </p>
                                </fieldset>
                            </form>
                            <a href="register.php" class="btn btn-md btn-theme-2 full-width">Kayıt Ol</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Login End ================================== -->

<?php require_once 'footer.php'; ?>