<!-- ============================ Hero Banner  Start================================== -->
<div class="image-bottom search-header-banner" style="background:#d80649 url(assets/img/banner.png) no-repeat;" data-overlay="0">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-9 col-md-12">

                <?php
                if (!isset($_SESSION['users']['users_id'])) {
                ?>
                    <p class="lead-i m-0">Bize Katıl!</p>
                <?php } ?>

                <h1 class="big-header-capt capti">Keşfet Öğren Paylaş</h1>
                <div class="full-search-2 Reveal-search Reveal-search-radius box-style">
                    <div class="Reveal-search-content">

                        <form method="POST" action="search.php">

                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-12 br-left-p">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <input type="text" class="form-control" name="search_name" placeholder="Aranacak kelimeyi yaz...">
                                            <i class="ti-search"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <button name="search_blog" class="btn search-btn btn-black">Ara</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>
                <div class="popular-cat-list">
                    <ul>

                        <?php
                        $sql = $db->read("category", [
                            "columns_sort" => "DESC",
                            "columns_name" => "category_slug",
                            "limit" => 4
                        ]);
                        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        ?>

                            <li><a href="category-details/<?php echo $db->seo($row['category_slug']); ?>"><?php echo $row['category_name'] ?></a></li>

                        <?php } ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->