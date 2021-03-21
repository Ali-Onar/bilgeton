<?php

$value1 = basename($_SERVER['PHP_SELF']);
$value2 = basename(__FILE__);


// istenmeyen sayfalara erişim engeli
function accessBlock($value1, $value2) {

    if ($value1 == $value2) {
        exit('Bu sayfaya erişim yasak!');
    }
}

accessBlock($value1,$value2);