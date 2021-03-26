<?php
ob_start();
session_start();

require_once 'nedmin/netting/class.crud.php';
$db = new CRUD();

$sql = $db->read("settings");
//$sql = $db->qSql("SELECT * FROM settings");
# fetch_assoc: sütuna göre isim getiriyor
$row = $sql->fetchAll(PDO::FETCH_ASSOC);

// echo "<pre>";
// print_r($row);

foreach ($row as $key) {
    $settings[$key['settings_key']] = $key['settings_value'];

    //echo $key['settings_key'] . "------>>>>" . $key['settings_value']."<br>";
}
