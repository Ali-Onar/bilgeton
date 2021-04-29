<?php require_once '../header.php' ?>
<!-- Top header  -->
<!-- ============================================================== -->

<!-- ============================ Page Title Start================================== -->
<div class="image-cover page-title" style="background:url(https://via.placeholder.com/) no-repeat;" data-overlay="6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title">İletişim</h2>
                <span class="ipn-subtitle text-light">Bize ulaşın</span>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Agency List Start ================================== -->
<section class="gray">

    <div class="container">

        <!-- row Start -->
        <div class="row justify-content-center">

            <div class="col-lg-7 col-md-7">

                <?php
                if (@$_GET['success'] == 'ok') { ?>
                    <div class="alert alert-success">Mesajınız başarıyla iletildi.</div>
                <?php } ?>

                <form method="POST" action="inc/contact-post.php">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>İsim*</label>
                                <input type="text" name="contact_name" required="" class="form-control" placeholder="İsminiz">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label>Email*</label>
                                <input type="email" name="contact_email" required="" class="form-control" placeholder="Mail Adresiniz">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Konu*</label>
                        <input type="text" name="contact_title" required="" class="form-control" placeholder="Konu">
                    </div>

                    <div class="form-group">
                        <label>Mesaj*</label>
                        <textarea class="form-control" name="contact_message" required="" placeholder="Mesajınız"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-theme" name="contact_send" type="submit">Gönder</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Agency List End ================================== -->

<?php require_once '../footer.php' ?>