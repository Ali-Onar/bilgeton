<?php
if (!isset($_SESSION['admins'])) {
    header('Location: login.php');
    exit; 
}