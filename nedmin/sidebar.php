<?php
$sql = $db->wread("admins", "admins_id", $_SESSION['admins']['admins_id']);
$row = $sql->fetch(PDO::FETCH_ASSOC);
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dimg/admins/<?php echo $row['admins_file']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                    <?php echo $row['admins_name']; ?>
                </p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Yönetici</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÜLER</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="index.php"><i class="fa fa-home"></i> <span>Anasayfa</span></a></li>
            <li><a href="todolist.php"><i class="ion ion-clipboard"></i> <span>Yapılacaklar</span></a></li>
            <li><a href="users.php"><i class="fa fa-user"></i> <span>Kullanıcılar</span></a></li>
            <li><a href="admins.php"><i class="fa fa-user-secret"></i> <span>Yöneticiler</span></a></li>
            <li><a href="blog.php"><i class="fa fa-bookmark"></i> <span>Yazılar</span></a></li>
            <li><a href="category.php"><i class="fa fa-server"></i> <span>Kategoriler</span></a></li>
            <li><a href="settings.php"><i class="fa fa-cog"></i> <span>Ayarlar</span></a></li>
            <li><a href="about-us.php"><i class="fa fa-inbox"></i> <span>Hakkımızda</span></a></li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>