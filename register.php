<?php require_once 'header.php';

// require_once 'nedmin/netting/class.crud.php';
// $db = new CRUD();

$sql = $db->read("users");
$row = $sql->fetchAll(PDO::FETCH_ASSOC);


foreach ($row as $key) {

    $rows['users_name'] = $key['users_name'];
    $rows['users_mail'] = $key['users_mail'];
    
    //echo $rows['users_name'] . "------>>>>" . $key['users_mail']."<br>";
}
?>

<!-- ============================ Login Start================================== -->
<section class="gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10">
                <div class="loving-modern-login">

                    <div class="text-center mb-4"><img width="100" src="nedmin/dimg/settings/<?php echo $settings['logo'] ?>" class="img-fluid" alt="" /></div>
                    <div class="row main_login_form">
                        <div class="login_form_dm">

                            <?php


                            // Form işlemleri
                            if (isset($_POST['users_register'])) {



                                $result = $db->usersRegister(
                                    htmlspecialchars($_POST['users_name']),
                                    htmlspecialchars($_POST['users_mail']),
                                    htmlspecialchars($_POST['users_password1']),
                                    htmlspecialchars($_POST['users_password2']),
                                    htmlspecialchars($rows['users_name']),
                                    htmlspecialchars($rows['users_mail']),
                                    ["slug" => "users_slug"]
                                );

                                if ($result['status']) { 
                                    Header("Location: login.php");
                                    ?>
                                    
                                <?php
                                } else { ?>
                                    <div class="alert alert-danger"><?php echo $result['error']; ?></div>
                            <?php
                                }
                            }
                            ?>

                            <form id="edd_login_form" class="edd_form" method="post">
                                <fieldset>
                                    <p class="edd-login-username">
                                        <label>Adınız</label>
                                        <input class="form-control" type="text" required="" name="users_name" placeholder="Adınızı giriniz">
                                    </p>
                                    <p class="edd-login-username">
                                        <label>Email</label>
                                        <input class="form-control" type="text" required="" name="users_mail" placeholder="Email adresiniz">
                                    </p>
                                    <p class="edd-login-password">
                                        <label>Parola</label>
                                        <input class="form-control" type="password" required="" name="users_password1" placeholder="Parolanızı giriniz">
                                    </p>
                                    <p class="edd-login-password">
                                        <label>Parolayı Tekrarla</label>
                                        <input class="form-control" type="password" required="" name="users_password2" placeholder="Parolayı tekrar giriniz">
                                    </p>
                                    <p class="already-login">
                                        Hesabın var mı? <a href="login.php" class="theme-cl">Giriş Yap</a>
                                    </p>
                                    <p class="edd-login-submit">
                                        <input type="submit" class="btn btn-md btn-theme full-width" name="users_register" value="Kayıt Ol">
                                    </p>

                                </fieldset>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Login End ================================== -->

<?php require_once 'footer.php'; ?>