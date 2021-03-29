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

    <title><?php echo $settings['title'] ?></title>

    <!-- All Plugins Css -->
    <link rel="stylesheet" href="assets/css/plugins.css">


    <!-- Custom CSS -->
    <link href="assets/css/styles.css" rel="stylesheet">

    <!-- Custom Color Option -->
    <link href="assets/css/colors.css" rel="stylesheet">

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

                            <li class="active"><a href="javascript:void(0);">Home<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="index.html">Home Style 1</a></li>
                                    <li><a href="home-2.html">Home Style 2</a></li>
                                    <li><a href="home-3.html">Home Style 3</a></li>
                                    <li><a href="home-4.html">Home Style 4</a></li>
                                    <li><a href="home-5.html">Home Style 5</a></li>
                                    <li><a href="home-6.html">Home Style 6</a></li>
                                    <li><a href="Map.html">Home Map</a></li>
                                </ul>
                            </li>

                            <li><a href="javascript:void(0);">Explore<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="events.html">All Events</a></li>
                                    <li><a href="hotels.html">Find Hotels</a></li>
                                    <li><a href="adventures.html">Find Adventures</a></li>
                                    <li><a href="booking.html">Booking Page</a></li>
                                    <li><a href="dashboard.html">User Dashboard</a></li>
                                    <li><a href="add-listing.html">Submit Listing</a></li>
                                </ul>
                            </li>

                            <li><a href="javascript:void(0);">Listings<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="javascript:void(0);">List Layouts<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="list-layout-with-sidebar.html">With Sadebar</a></li>
                                            <li><a href="list-layout-full-width.html">Full Width</a></li>
                                            <li><a href="list-layout-with-map.html">With Map</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0);">Grid Layouts<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu" style="display: none;">
                                            <li><a href="grid-with-sidebar.html">With Sidebar</a></li>
                                            <li><a href="grid-full-width.html">With Full Width</a></li>
                                            <li><a href="grid-with-map.html">With Map</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0);">Half Map Screen<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="half-map-with-list-layout.html">With List Layout</a></li>
                                            <li><a href="half-map-with-grid-layout.html">With Grid Layout</a></li>
                                            <li><a href="half-map-with-grid2-layout.html">With Grid Layout 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0);">Single Listing<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="single-listing-1.html">Single Listing 1</a></li>
                                            <li><a href="single-listing-2.html">Single Listing 2</a></li>
                                            <li><a href="single-listing-3.html">Single Listing 3</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="javascript:void(0);">Pages<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="blog.html">Blog Page</a></li>
                                    <li><a href="blog-detail.html">Blog Detail</a></li>
                                    <li><a href="pricing.html">Pricing Page</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="component.html">Component</a></li>
                                    <li><a href="404.html">Error Page</a></li>
                                    <li><a href="login.html">LogIn</a></li>
                                    <li><a href="register.html">SignUp</a></li>
                                </ul>
                            </li>

                            <li><a href="contact.html">Contacts</a></li>

                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">

                            <?php
                            if (isset($_SESSION['users']['users_id'])) {
                            ?>

                                <li class="attributes">
                                    <div class="btn-group account-drop">
                                        <button type="button" class="btn btn-order-by-filt theme-cl" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="nedmin/dimg/users/<?php echo $rowUsers['users_file'] ?>" class="avater-img" alt=""><?php echo $rowUsers['users_name'] ?>
                                        </button>
                                        <div class="dropdown-menu pull-right animated flipInX">
                                            <a href="profile.php"><i class="ti-user"></i>Profil</a>
                                            <a href="profile-edit.php"><i class="ti-pencil"></i>Profili Düzenle</a>
                                            <a href="logout.php"><i class="ti-power-off"></i>Çıkış Yap</a>
                                        </div>
                                    </div>
                                </li>

                            <?php } else { ?>
                                <li>
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#login">
                                        <i class="fa fa-sign-in-alt mr-1"></i><span class="dn-lg">Sign In</span>
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