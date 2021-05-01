<!-- Single blog Grid -->
<div class="col-lg-4 col-md-12 col-sm-12 col-12">

    <!-- Categories -->
    <div class="single-widgets widget_category">
        <h4 class="title">Kategoriler</h4>
        <ul>

            <?php

            $sql = $db->read("category", [
                "columns_sort" => "DESC",
                "columns_name" => "category_slug",
                "limit" => 5
            ]);
            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {

            ?>

                <li><a href="category-details/<?php echo $db->seo($row['category_slug']); ?>"><?php echo $row['category_name'] ?></a></li>

            <?php } ?>
        </ul>
    </div>

    <!-- Trending Posts -->
    <div class="single-widgets widget_thumb_post">
        <h4 class="title">Bilgeton'da Trend</h4>
        <ul>

            <?php
            $sql = $db->qSql("SELECT blogs.*, users.* 
            FROM blogs INNER JOIN users 
            ON blogs.users_id=users.users_id order by blogs_time DESC limit 5");

            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            ?>

                <li>
                    <span class="left">
                        <img src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" alt="<?php echo $row['blogs_title'] ?>" class="">
                    </span>
                    <span class="right">
                        <a class="feed-title" href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>"><?php echo $row['blogs_title'] ?></a>
                        <span class="post-date"><i class="ti-calendar"></i><?php echo $db->tDate($row['blogs_time'], ['date' => TRUE]); ?></span>
                    </span>
                </li>

            <?php } ?>

        </ul>
    </div>

    <!-- Tags Cloud -->
    <!-- <div class="single-widgets widget_tags">
        <h4 class="title">Etiket Bulutu</h4>
        <ul>
            <li><a href="#">Lifestyle</a></li>
            <li><a href="#">Travel</a></li>
            <li><a href="#">Fashion</a></li>
            <li><a href="#">Branding</a></li>
            <li><a href="#">Music</a></li>
        </ul>
    </div> -->

</div>