<?php require_once 'header.php';

if (empty($_SESSION['users'])) {
    Header("Location:404.php");
    exit;
}

?>

<section class="gray">
    <div class="container-fluid">
        <div class="row">
            <?php require_once 'profile-sidebar.php'; ?>
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="Reveal-dashboard-wrapers">

                    <div class="Reveal-gravity-list mt-0">
                        <h4>Yazılarım</h4>
                        <ul>
                            <?php
                            $forBlogsUsersID = $_SESSION['users']['users_id'];
                            $sql = $db->qSql(
                                "SELECT * FROM blogs WHERE users_id=:users_id order by blogs_time DESC",
                                'users_id',
                                $forBlogsUsersID
                            );

                            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <li>
                                    <div class="Reveal-list-box-listing">
                                        <div class="Reveal-Reveal-list-box-listing-img"><a href="#"><img src="nedmin/dimg/blogs/<?php echo $row['blogs_file'] ?>" class="img-responsive" alt="<?php echo $row['blogs_title'] ?>"></a></div>
                                        <div class="Reveal-Reveal-box-listing-content">
                                            <div class="inner">
                                                <h3><a href="bloglar/<?php echo $db->seo($row['blogs_slug']); ?>"><?php echo $row['blogs_title'] ?></a></h3>
                                                <span><?php echo mb_substr($row['blogs_content'], 0, 100) ?>...</span>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons-to-right">
                                        <a href="#" class="button gray"><i class="ti-pencil"></i> Düzenle</a>
                                        <a href="#" class="button gray"><i class="ti-trash"></i> Sil</a>
                                    </div>
                                </li>

                            <?php } ?>


                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once 'footer.php'; ?>