<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="Reveal-dashboard-navbar">

        <div class="Reveal-d-user-avater">
            <img src="nedmin/dimg/users/<?php echo $row['users_file'] ?>" class="img-fluid avater" alt="">
            <h4><?php echo $row['users_name'] ?></h4>
            <span><?php echo $row['users_location'] ?></span>
        </div>

        <div class="Reveal-dash-navigation">
            <ul>
                <li><a href="article-add.php"><i class="ti-plus"></i>Yazı Ekle</a></li>
                <li><a href="book-add.php"><i class="ti-pencil-alt"></i>Kitap Ekle</a></li>
                <!-- <li><a href="dashboard.php"><i class="ti-dashboard"></i>Gösterge Paneli</a></li> -->
                <li class="active"><a href="profile-edit.php"><i class="ti-user"></i>Profili Düzenle</a></li>
                <!-- <li><a href="favories.php"><i class="ti-heart"></i>Favoriler</a></li> -->
                <li><a href="change-password.php"><i class="ti-unlock"></i>Parolamı Değiştir</a></li>
                <li><a href="#"><i class="ti-power-off"></i>Güvenli Çıkış</a></li>
            </ul>
        </div>

    </div>
</div>