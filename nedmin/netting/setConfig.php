<?php
require_once 'class.crud.php';
$db = new CRUD();

if (!isset($_SESSION['admins']) && isset ($_COOKIE['adminsLogin'])) {
    $adminsLogin = json_decode($_COOKIE['adminsLogin']);

    $result = $db->adminsLogin($adminsLogin->admins_username, $adminsLogin->admins_password, TRUE);

    if ($result['status']) {
        header("Location: index.php");
        exit;
    }
}


if (!isset($_SESSION['admins'])) {
    header('Location: login.php');
    exit;
}

