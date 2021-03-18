<?php

session_start();

# SESSION'da tutulan admins verilerini sil
unset($_SESSION['admins']);
header('Location: login.php');
exit;
