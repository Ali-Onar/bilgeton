<?php require_once 'header.php'; ?>

<!-- ============================ Login Start================================== -->
<section class="gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="loving-modern-login">

                    <div class="text-center mb-4"><img src="assets/img/logo-icon.png" class="img-fluid" alt="" /></div>
                    <div class="row main_login_form">
                        <div class="login_form_dm">
                            <form id="edd_login_form" class="edd_form" method="post">
                                <fieldset>
                                    <p class="edd-login-username">
                                        <label>Adınız</label>
                                        <input class="form-control" type="text" placeholder="Username">
                                    </p>
                                    <p class="edd-login-username">
                                        <label>Email</label>
                                        <input class="form-control" type="text" placeholder="Your Email">
                                    </p>
                                    <p class="edd-login-password">
                                        <label>Parola</label>
                                        <input class="form-control" type="password" placeholder="Password">
                                    </p>
                                    <p class="edd-login-password">
                                        <label>Parolayı Tekrarla</label>
                                        <input class="form-control" type="password" placeholder="Confirm Password">
                                    </p>
                                    <p class="already-login">
                                        Hesabın var mı? <a href="login.php" class="theme-cl">Giriş Yap</a>
                                    </p>
                                    <p class="edd-login-submit">
                                        <input type="submit" class="btn btn-md btn-theme full-width" value="Login">
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