<?php require_once 'header.php'; ?>

<!-- ============================ Reviews Start ================================== -->
<section class="light-bg">
    <div class="container">

        <!-- row Start -->
        <div class="row">
            <?php
            $sql = $db->read("users", [
                "columns_sort" => "DESC",
                "columns_name" => "users_must"
            ]);
            $say = 1;
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <!-- Single blog Grid -->
                <div class="col-lg-3 col-md-9">
                    <div class="Reveal-blog-wrap-grid">


                        <div class="Reveal-blog-info">
                            <a href="users/<?php echo $db->seo($row['users_slug']); ?>">
                                <span class="post-date"><i class="ti-user"></i><?php echo $row['users_name']; ?></span>
                            </a>
                        </div>

                        <div class="Reveal-blog-body">

                            <p><?php echo $row['users_title'] ?></p>

                        </div>

                    </div>
                </div>
            <?php } ?>

        </div>
        <!-- /row -->

    </div>
</section>
<!-- ============================ Reviews End ================================== -->

<?php require_once 'footer.php'; ?>