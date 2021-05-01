<?php
require_once 'header.php';

// $sql = $db->wread("blogs", "blogs_slug", $_GET['blogs_slug']);
// $row = $sql->fetch(PDO::FETCH_ASSOC);

$sql = $db->wreadBlog(
    "SELECT blogs.*, users.* FROM blogs INNER JOIN users ON blogs.users_id=users.users_id WHERE blogs_slug=?",
    $_GET['blogs_slug']
);
$row = $sql->fetch(PDO::FETCH_ASSOC);

?>

<!-- ============================ Agency List Start ================================== -->
<section>

    <div class="container">

        <!-- row Start -->
        <div class="row">

            <!-- Blog Detail -->
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="blog-details single-post-item format-standard">
                    <div class="post-details">

                        <div class="post-featured-img">
                            <img class="img-fluid" src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" alt="">
                        </div>

                        <div class="post-top-meta">
                            <ul class="meta-comment-tag">
                                <li><a href="#"><span class="icons"><i class="ti-user"></i></span>by <?php echo $row['users_name']; ?></a></li>
                                <li><a href="#"><span class="icons"><i class="ti-medall-alt"></i></span><?php echo $db->tDate($row['blogs_time'], ['date' => TRUE]); ?></a></li>
                            </ul>
                        </div>
                        <h2 class="post-title"><?php echo $row['blogs_title']; ?></h2>
                        <p>
                            <?php echo $row['blogs_content']; ?>
                        </p>
                        <div class="post-bottom-meta">
                            <div class="post-tags">
                                <h4 class="pbm-title">İlgili Etiketler</h4>
                                <ul class="list">
                                    <?php
                                    $tags = $row['blogs_tag'];
                                    $tags = explode(',', $tags);
                                    foreach ($tags as $key => $value) {
                                        echo "<li>" . $value . "</li>";
                                    }
                                    ?>
                                </ul>
                            </div>

                            <!--
                            <div class="post-share">
                                <h4 class="pbm-title">Paylaş</h4>
                                <ul class="list">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vk"></i></a></li>
                                    <li><a href="#"><i class="fab fa-tumblr"></i></a></li>
                                </ul>
                            </div>
                            -->

                        </div>

                        <!--
                        <div class="single-post-pagination">
                            <div class="prev-post">
                                <a href="#">
                                    <div class="title-with-link">
                                        <span class="intro">Önceki Gönderi</span>
                                        <h3 class="title">Tips on Minimalist</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="post-pagination-center-grid">
                                <a href="#"><i class="ti-layout-grid3"></i></a>
                            </div>
                            <div class="next-post">
                                <a href="#">
                                    <div class="title-with-link">
                                        <span class="intro">Sonraki Gönderi</span>
                                        <h3 class="title">Less Is More</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        -->
                    </div>
                </div>

                <!-- Author Detail -->
                <!-- <div class="blog-details single-post-item format-standard">

                    <div class="posts-author">
                        <span class="img"><img class="img-fluid" src="https://via.placeholder.com/400x400" alt=""></span>
                        <h3 class="pa-name">Rosalina William</h3>
                        <ul class="social-links">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                        <p class="pa-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                    </div>

                </div> -->




            </div>

            <?php require_once 'blog-detail-sidebar.php'; ?>

        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Agency List End ================================== -->

<?php require_once 'footer.php'; ?>