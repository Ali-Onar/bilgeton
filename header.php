<?php

require_once "settings.php";

if (isset($_SESSION['users']['users_id'])) {
    $sqlUsers = $db->wread("users", "users_id", $_SESSION['users']['users_id']);
    $rowUsers = $sqlUsers->fetch(PDO::FETCH_ASSOC);
}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="<?php echo $settings['description'] ?>">
    <meta name="keywords" content="<?php echo $settings['keywords'] ?>">
    <meta name="author" content="<?php echo $settings['author'] ?>">
    <link rel="icon" href="nedmin/dimg/settings/<?php echo $settings['icon'] ?>" type="image/gif" sizes="16x16">
    <title><?php echo $settings['title'] ?></title>

    <?php if ($_SERVER['HTTP_HOST'] == 'localhost') { ?>
        <base href="http://localhost/bilgeton/index.php">
    <?php } else { ?>
        <base href="https://www.bilgeton.com/index.php">
    <?php } ?>

    <!-- All Plugins Css -->
    <link rel="stylesheet" href="assets/css/plugins.css">


    <!-- Custom CSS -->
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="assets/css/colors.css" rel="stylesheet">
    <!-- CKEditör -->
    <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

</head>

<body class="red-skin">

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <div class="header header-light">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="#">
                            <img src="nedmin/dimg/settings/<?php echo $settings['logo'] ?>" class="logo" alt="" />
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper">
                        <ul class="nav-menu">

                            <li><a href="index.php">Anasayfa</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="users.php">Yazarlar</a></li>
                            <li><a href="category.php">Kategoriler</a></li>
                            <li><a href="inc/about-us.php">Hakkımızda</a></li>
                            <li><a href="inc/contact.php">İletişim</a></li>

                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">

                            <?php
                            if (isset($_SESSION['users']['users_id'])) {
                            ?>

                                <li class="add-listing">
                                    <a href="article-add.php">
                                        <i class="fas fa-plus-circle"></i> Yazı Ekle
                                    </a>
                                </li>

                                <li class="attributes">
                                    <div class="btn-group account-drop">
                                        <button type="button" class="btn btn-order-by-filt theme-cl" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="nedmin/dimg/users/<?php echo $rowUsers['users_file'] ?>" class="avater-img" alt=""><?php echo $rowUsers['users_name'] ?>
                                        </button>
                                        <div class="dropdown-menu pull-right animated flipInX">

                                            <?php
                                            $sql = $db->wread("users", "users_id", $_SESSION['users']['users_id']);
                                            $row = $sql->fetch(PDO::FETCH_ASSOC);
                                            ?>

                                            <a href="users/<?php echo $db->seo($row['users_slug']); ?>"><i class="ti-user"></i>Profil</a>
                                            <a href="profile-edit.php"><i class="ti-pencil"></i>Profili Düzenle</a>
                                            <a href="my-articles.php"><i class="ti-bookmark"></i>Yazı Listem</a>
                                            <a href="my-books.php"><i class="ti-bookmark-alt"></i>Kitap Listem</a>
                                            <a href="logout.php"><i class="ti-power-off"></i>Çıkış Yap</a>
                                        </div>
                                    </div>
                                </li>



                            <?php } else { ?>
                                <li>
                                    <a href="login.php">
                                        <i class="fa fa-sign-in-alt mr-1"></i><span class="dn-lg">Giriş Yap / Kayıt Ol</span>
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->