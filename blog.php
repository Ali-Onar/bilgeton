<?php require_once "header.php"; ?>

<!-- =================== Sidebar Search ==================== -->
<section class="gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">

                <!-- property Sidebar -->
                <div class="Reveal-exlip-sidebar">

                    <div class="Reveal-exlip-sidebar-header">
                        <div class="exlip-header-flex">
                            <h4>Uygula</h4>
                        </div>
                        <div class="exlip-header-last">
                            <a href="javascript:void(0);" class="elip-btn-side" data-toggle="collapse" data-target="#filter-search"><i class="fas fa-sliders-h"></i></a>
                        </div>
                    </div>

                    <!-- Find New Property -->
                    <div class="Reveal-exlip-sidebar-body show" id="filter-search">
                        <div class="Reveal-exlip-sidebar-widgets">
                            <form method="POST" action="search.php">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" name="search_name" placeholder="Aranacak kelimeyi yazın.">

                                        <i class="ti-search"></i>
                                    </div>
                                </div>


                                <div class="text-center">
                                    <button name="search_blog" class="btn btn-theme btn-md full-width">Ara</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar End -->

            <div class="content-area col-lg-9 col-md-12">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="shorting-wrap">
                            <h5 class="shorting-title">
                                <?php
                                // $sql = $db->read("blogs");
                                // $row = $sql->fetchAll(PDO::FETCH_ASSOC);

                                // $i = 1;
                                // echo count($row[$i]);

                                ?>
                            </h5>
                            <div class="shorting-right">
                                <label>Short By:</label>
                                <div class="dropdown show">
                                    <a class="btn btn-filter dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="selection">Most Rated</span>
                                    </a>
                                    <div class="drp-select dropdown-menu">
                                        <a class="dropdown-item" href="JavaScript:Void(0);">Most Rated</a>
                                        <a class="dropdown-item" href="JavaScript:Void(0);">Most Viewd</a>
                                        <a class="dropdown-item" href="JavaScript:Void(0);">News Listings</a>
                                        <a class="dropdown-item" href="JavaScript:Void(0);">High Rated</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single List Start -->
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <?php

                        // pagination - sayfalama baş

                        $sayfada = 6; // sayfada gösterilecek içerik miktarını belirtiyoruz.
                        $sorgu = $db->qSql("select * from blogs");
                        $sorgu->execute();
                        $toplam_icerik = $sorgu->rowCount();
                        $toplam_sayfa = ceil($toplam_icerik / $sayfada);
                        // eğer sayfa girilmemişse 1 varsayalım.
                        $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                        // eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
                        if ($sayfa < 1) $sayfa = 1;
                        // toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
                        if ($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa;
                        $limit = ($sayfa - 1) * $sayfada;

                        // pagination - sayfalama bit

                        $sql = $db->qSql("SELECT blogs.*, users.* FROM blogs INNER JOIN users ON blogs.users_id=users.users_id order by blogs_time DESC limit $limit, $sayfada");

                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                            <!--  Single Listing -->
                            <div class="Reveal-verticle-list listing-shot">
                                <a href="#" class="list-cat theme-bg"><?php echo $db->tDate($row['blogs_time'], ['date' => TRUE]); ?></a>
                                <div class="Reveal-signle-item">
                                    <a class="listing-item" href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>">
                                        <div class="listing-items">
                                            <div class="listing-shot-img">
                                                <img src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" class="img-responsive" alt="<?php echo $row['blogs_title'] ?>" />
                                            </div>
                                        </div>
                                    </a>
                                    <div class="Reveal-verticle-listing-caption">
                                        <a href="#" class="like-listing"><i class="ti-heart"></i></a>
                                        <div class="Reveal-listing-shot-caption">
                                            <h4><a href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>"><?php echo $row['blogs_title'] ?></a> <span class="approve-listing"><i class="fa fa-check"></i></span></h4>



                                            <!-- <p class="Reveal-short-descr"> <?php // echo mb_substr($row['blogs_content'], 0, 100) 
                                                                                ?>...</p> -->

                                            <span class="post-date"><i class="ti-user"></i><a href="users/<?php echo $db->seo($row['users_slug']); ?>"><?php echo $row['users_name'] ?></a></span>
                                            <div class="Reveal-listing-shot-info rating">
                                                <a href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>" class="bl-continue">Devamını Oku</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <div align="right" class="col-md-12">
                            <ul class="pagination">

                                <?php
                                $s = 0;

                                while ($s < $toplam_sayfa) {
                                    $s++;
                                    if ($s == $sayfa) { ?>

                                        <li><a href="blog?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>

                                    <?php } else { ?>

                                        <li><a href="blog?sayfa=<?php echo $s; ?>"><?php echo $s; ?></a></li>

                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- =================== Sidebar Search ==================== -->

<?php require_once("footer.php"); ?>