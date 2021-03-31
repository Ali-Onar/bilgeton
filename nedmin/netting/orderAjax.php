<?php
require_once('class.crud.php');
$db = new CRUD();

if (isset($_GET['admins_must'])) {
    $result = $db->ajaxUpdate("admins", $_POST['item'], "admins_must", "admins_id");
    $returnMessage = ['processResult' => true, 'processMessage' => $result['status']];
    echo json_encode($returnMessage);
}