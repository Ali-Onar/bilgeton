<?php
require_once "header.php";
require_once "search-banner.php";
?>

<!-- ============================ Calegory Start ================================== -->
<section class="half light gray">
    <div class="container">
        <div class="row">
            <div class="owl-carousel owl-theme" id="categorie-slide">
                <?php
                $sql = $db->read("category", [
                    "columns_sort" => "DESC",
                    "limit" => 6
                ]);
                $say = 1;
                while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                ?>



                    <!-- Single Category -->
                    <div class="Reveal-cats-box">
                        <a href="grid-with-sidebar.html" class="Reveal-category-box">
                            <div class="category-desc">
                                <div class="category-icon">
                                    <i class="<?php echo $row['category_icon'] ?>"></i>
                                </div>

                                <div class="Reveal-category-detail category-desc-text">
                                    <h4><?php echo $row['category_name'] ?></h4>
                                    <p>122 Listings</p>
                                </div>
                            </div>
                        </a>
                    </div>


                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Calegory End ================================== -->

<!-- ============================ Agency List Start ================================== -->
<section>

    <div class="container">

        <div class="row">
            <div class="col text-center">
                <div class="sec-heading center">
                    <h2>Fırından</h2>
                    <h3>Yeni <span class="theme-cl">Çıkanlar</span></h3>
                </div>
            </div>
        </div>

        <!-- row Start -->
        <div class="row">
            <?php
            $sql = $db->read("blogs", [
                "columns_sort" => "DESC",
                "columns_name" => "blogs_must",
                "limit" => 6
            ]);
            $say = 1;
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-6">
                    <div class="Reveal-hotel-item">
                        <figure class="Reveal-hotel-wrap">
                            <a href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>">
                                <img src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" class="cover" alt="<?php echo $row['blogs_title'] ?>" />
                        </figure>
                        </a>

                        <div class="Reveal-blog-info">
                            <span class="post-date"><i class="ti-user"></i><?php echo $row['users_id']; ?></span>
                        </div>

                        <div class="Reveal-blog-body">
                            <h4 class="bl-title"><a href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>"><?php echo $row['blogs_title'] ?></a></h4>
                            <p><?php echo mb_substr($row['blogs_content'], 0, 200) ?>...</p>
                            <a href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>" class="bl-continue">Devamını Oku</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Agency List End ================================== -->

<!-- ============================ Step How To Use Start ================================== -->
<section>
    <div class="container">

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h2>Süreç</h2>
                    <h3>Nasıl <span class="theme-cl">Çalışır</span></h3>
                </div>
            </div>
        </div>
        <!-- Row -->

        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="Reveal-working-step">
                    <div class="Reveal-icon-wrap">
                        <div class="Reveal-icon-large-box f-light-success"><i class="ti-map-alt text-success"></i></div>
                    </div>
                    <div class="Reveal-working-box-caption">
                        <h4>Find Interesting Place</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="Reveal-working-step">
                    <div class="Reveal-icon-wrap">
                        <div class="Reveal-icon-large-box f-light-warning"><i class="ti-user text-warning"></i></div>
                    </div>
                    <div class="Reveal-working-box-caption">
                        <h4>Contact a Few Owners</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="Reveal-working-step remove">
                    <div class="Reveal-icon-wrap">
                        <div class="Reveal-icon-large-box f-light-blue"><i class="ti-shield text-blue"></i></div>
                    </div>
                    <div class="Reveal-working-box-caption">
                        <h4>Make a Reservation</h4>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<div class="clearfix"></div>
<!-- ============================ Step How To Use End ====================== -->

<!-- ============================ Reviews Start ================================== -->
<section class="light-bg">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h2>Yorumlar</h2>
                    <h3>İnsanlar <span class="theme-cl">Ne Diyor</span></h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="owl-carousel owl-theme" id="reviews-slide">

                    <!-- Single Review -->
                    <div class="item">
                        <div class="smart-testimonials">
                            <div class="smart-testi-thumb">
                                <img src="https://via.placeholder.com/700x450" class="img-fluid" alt="" />
                                <span class="cipt bg-success"><i class="fas fa-quote-left"></i></i></span>
                            </div>
                            <div class="smart-testimonials-content">
                                <div class="Reveal-smart-tes-content">
                                    <p>At vero eos et accusamus et iusto odiopri dignissimos ducimus qui expedita distinctio praesentium voluptatum.</p>
                                </div>
                                <div class="Reveal-st-author-info">
                                    <h4 class="Reveal-st-author-title">Adam Gilkrist</h4>
                                    <span class="Reveal-st-author-subtitle theme-cl">CEO & Founder</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Review -->
                    <div class="item">
                        <div class="smart-testimonials">
                            <div class="smart-testi-thumb">
                                <img src="https://via.placeholder.com/700x450" class="img-fluid" alt="" />
                                <span class="cipt bg-purple"><i class="fas fa-quote-left"></i></i></span>
                            </div>
                            <div class="smart-testimonials-content">
                                <div class="Reveal-smart-tes-content">
                                    <p>At vero eos et accusamus et iusto odiopri dignissimos ducimus qui expedita distinctio praesentium voluptatum.</p>
                                </div>
                                <div class="Reveal-st-author-info">
                                    <h4 class="Reveal-st-author-title">Lilly Wikdoner</h4>
                                    <span class="Reveal-st-author-subtitle theme-cl">Content Writer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Review -->
                    <div class="item">
                        <div class="smart-testimonials">
                            <div class="smart-testi-thumb">
                                <img src="https://via.placeholder.com/700x450" class="img-fluid" alt="" />
                                <span class="cipt bg-danger"><i class="fas fa-quote-left"></i></i></span>
                            </div>
                            <div class="smart-testimonials-content">
                                <div class="Reveal-smart-tes-content">
                                    <p>At vero eos et accusamus et iusto odiopri dignissimos ducimus qui expedita distinctio praesentium voluptatum.</p>
                                </div>
                                <div class="Reveal-st-author-info">
                                    <h4 class="Reveal-st-author-title">Subhas Rajpoot</h4>
                                    <span class="Reveal-st-author-subtitle theme-cl">Team Leader</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Review -->
                    <div class="item">
                        <div class="smart-testimonials">
                            <div class="smart-testi-thumb">
                                <img src="https://via.placeholder.com/700x450" class="img-fluid" alt="" />
                                <span class="cipt bg-primary"><i class="fas fa-quote-left"></i></i></span>
                            </div>
                            <div class="smart-testimonials-content">
                                <div class="Reveal-smart-tes-content">
                                    <p>At vero eos et accusamus et iusto odiopri dignissimos ducimus qui expedita distinctio praesentium voluptatum.</p>
                                </div>
                                <div class="Reveal-st-author-info">
                                    <h4 class="Reveal-st-author-title">Pooja Mithali</h4>
                                    <span class="Reveal-st-author-subtitle theme-cl">Graphic Designer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<!-- ============================ Reviews End ================================== -->



<!-- ============================ Call To Action Start ================================== -->
<section class="call-to-act" style="background:#e4074e url(assets/img/landing-bg.png) no-repeat">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-7 col-md-8">
                <div class="clt-caption text-center mb-4">
                    <h3>Abone Olun!</h3>
                    <p>İçerikleri en önden takip edin.</p>
                </div>
                <div class="inner-flexible-box subscribe-box">
                    <div class="input-group">
                        <input type="text" class="form-control large" placeholder="Mail adresinizi buraya girin">
                        <button class="btn btn-subscribe" type="button"><i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Call To Action End ================================== -->


<?php
require_once "footer.php";
?>