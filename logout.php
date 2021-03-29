<?php

session_start();

# SESSION'da tutulan admins verilerini sil
unset($_SESSION['users']);
// setcookie("adminsLogin", json_encode($admins), strtotime("-30 day"), "/");
header('Location: login.php');
exit;
?>