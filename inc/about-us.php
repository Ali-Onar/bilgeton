<?php require_once '../header.php'; 

$sql = $db->read("about");
$row = $sql->fetch(PDO::FETCH_ASSOC);

?>

<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->

<!-- ============================ Page Title Start================================== -->
<div class="image-cover page-title" style="background:url(https://via.placeholder.com/1920x900) no-repeat;" data-overlay="6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <h2 class="ipt-title">Hakkımızda</h2>
                <span class="ipn-subtitle text-light">Biz Kimiz & Misyonumuz</span>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Our Story Start ================================== -->
<section>
    <div class="container">
        <div class="row justify-content-center">

           <!-- Single Box -->
           <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="about-captione">
                <h6 class="text-info"><?php echo $row['about_title'] ?></h6>
                    <p><?php echo $row['about_content'] ?></p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Our Story End ================================== -->

<!-- ============================ Reviews Start ================================== -->
<section class="light-bg">
    <div class="container">

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h2>Reviews</h2>
                    <h3>What People <span class="theme-cl">Saying</span></h3>
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

<!-- ============================ Step How To Use Start ================================== -->
<section>
    <div class="container">

        <!-- Row -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="sec-heading center">
                    <h2>Process</h2>
                    <h3>How It <span class="theme-cl">Works</span></h3>
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

<?php require_once '../footer.php'; ?>