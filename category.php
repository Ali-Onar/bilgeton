<?php require_once 'header.php'; ?>

<!-- ============================ Reviews Start ================================== -->
<section class="light-bg">
    <div class="container">

        <!-- row Start -->
        <div class="row">

            <?php
            $sql = $db->read("category");
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

            ?>
                <!-- Single Category -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="Reveal-cats-box">

                        <a href="category-details/<?php echo $db->seo($row['category_slug']); ?>" class="Reveal-category-box">
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
                </div>
            <?php } ?>

        </div>
        <!-- /row -->
    </div>
</section>
<!-- ============================ Reviews End ================================== -->

<?php require_once 'footer.php'; ?>