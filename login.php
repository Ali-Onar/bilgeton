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

                    <div class="text-center mb-4"><img src="assets/img/logo-icon.png" class="img-fluid" alt="" /></div>
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
                                        <input class="form-control" type="text" name="users_mail" placeholder="Your Username or Email">
                                    </p>
                                    <p class="edd-login-password">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="users_password" placeholder="*******">
                                    </p>
                                    <p class="edd-login-remember">
                                        <input id="remember" class="checkbox-custom" name="remember" type="checkbox">
                                        <label for="remember" class="checkbox-custom-label">Remember Me</label>
                                    </p>
                                    <p class="edd-lost-password">
                                        <a href="#">Lost Password?</a>
                                    </p>
                                    <p class="edd-login-submit">
                                        <input type="submit" name="users_login" class="btn btn-md btn-theme full-width" value="Login">
                                    </p>

                                </fieldset>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Login End ================================== -->

<?php require_once 'footer.php'; ?>