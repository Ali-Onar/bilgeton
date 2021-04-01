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
            <li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>
            <li><a href="users.php"><i class="fa fa-user"></i>Kullanıcılar</a></li>
            <li><a href="admins.php"><i class="fa fa-user-secret"></i>Yöneticiler</a></li>
            <li><a href="settings.php"><i class="fa fa-cog"></i>Ayarlar</a></li>
            <li><a href="about-us.php"><i class="fa fa-inbox"></i>Hakkımızda</a></li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>