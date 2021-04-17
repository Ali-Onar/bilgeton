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
                        <h4>Okuduğum Kitaplar</h4>

                        <?php
                        if (isset($_GET['booksDelete'])) {

                            $result = $db->delete("books", "books_id", $_GET['books_id']);

                            if ($result['status']) { ?>
                                <div class="alert alert-success">Silme Başarılı.</div>
                            <?php
                            } else { ?>
                                <div class="alert alert-danger">Silme Başarısız. <?php echo $result['error'] ?></div>
                        <?php
                            }
                        }
                        ?>

                        <ul>
                            <?php
                            $forBlogsUsersID = $_SESSION['users']['users_id'];
                            $sql = $db->qSql(
                                "SELECT * FROM books WHERE users_id=:users_id order by books_time ASC",
                                'users_id',
                                $forBlogsUsersID
                            );

                            while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                                <li>
                                    <div class="Reveal-list-box-listing">

                                        <div class="Reveal-Reveal-box-listing-content">
                                            <div class="inner">
                                                <span><?php echo $row['books_name'] ?></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="buttons-to-right">
                                        <a href="book-edit.php?books_id=<?php echo $row['books_id']; ?>" class="button gray"><i class="ti-pencil"></i> Düzenle</a>
                                        <a href="my-books.php?booksDelete=true&books_id=<?php echo $row['books_id']; ?>" class="button gray"><i class="ti-trash"></i> Sil</a>
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