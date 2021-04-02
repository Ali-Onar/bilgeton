
<!-- ============================ Footer Start ================================== -->
<footer class="dark-footer skin-dark-footer">
    <div>
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        
                        <p><?php echo $settings['address'] ?><br><?php echo $settings['district'] ?>, <?php echo $settings['province'] ?></p>
                        <ul class="footer-bottom-social">
                            <li><a href="<?php echo $settings['facebook'] ?>" target="_blank"><i class="ti-facebook"></i></a></li>
                            <li><a href="<?php echo $settings['twitter'] ?>" target="_blank"><i class="ti-twitter"></i></a></li>
                            <li><a href="<?php echo $settings['instagram'] ?>" target="_blank"><i class="ti-instagram"></i></a></li>
                            <li><a href="<?php echo $settings['linkedin'] ?>" target="_blank"><i class="ti-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        <ul class="footer-menu">
                            <li><a href="index.php">Anasayfa</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="users.php">Yazarlar</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        <ul class="footer-menu">
                            <li><a href="inc/about-us.php">Hakkımızda</a></li>
                            <li><a href="inc/contact.php">İletişim</a></li>
                            <li><a href="privacy.php">Gizlilik Sözleşmesi</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                        <ul class="footer-menu">
                            <li><a href="login.php">Giriş Yap</a></li>
                            <li><a href="register.php">Kayıt Ol</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4">
                    <div class="footer-widget">
                    <img src="nedmin/dimg/settings/bilgeton_footer.jpg" class="img-fluid f-logo" alt="" />
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12 col-md-12 text-center">
                    <p class="mb-0"><?php echo $settings['copyright'] ?></p>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- ============================ Footer End ================================== -->

<!-- Log In Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content" id="registermodal">
            <span class="mod-close" data-dismiss="modal"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title">Giriş <span class="theme-cl">Yapın</span></h4>
                <div class="login-form">

                    

                    <form method="post">

                        <div class="form-group">
                            <label>Mail Adresi</label>
                            <div class="input-with-icon gray">
                                <input type="mail" class="form-control" name="users_mail" placeholder="Mail Adresiniz">
                                <i class="ti-user"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Parola</label>
                            <div class="input-with-icon gray">
                                <input type="password" class="form-control" name="users_password" placeholder="Parolanız">
                                <i class="ti-unlock"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="users_login" class="btn btn-md full-width pop-login">Giriş Yap</button>
                        </div>

                    </form>
                </div>
                <div class="modal-divider"><span>ya da</span></div>
                <div class="social-login mb-3">
                    <ul>
                        <li><a href="#" class="btn fb"><i class="ti-facebook"></i></a></li>
                        <li><a href="#" class="btn google"><i class="ti-google"></i></a></li>
                        <li><a href="#" class="btn twitter"><i class="ti-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="modat-foot">
                    <div class="md-left">Hesabınız yok mu? <a href="register.html" class="theme-cl">Kayıt Olun!</a></div>
                    <div class="md-right"><a href="#" class="theme-cl">Parolamı unuttum!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>



</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/rangeslider.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/slick.js"></script>
<script src="assets/js/slider-bg.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/counterup.min.js"></script>

<script src="assets/js/custom.js"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->

</body>

</html>