<?php

if ($_SERVER['HTTP_HOST'] == 'localhost') {
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBNAME', 'bilgeton');
    define('DBPWD', '');
} else {
    define('DBHOST', 'localhost');
    define('DBUSER', 'hazirli1_bilgetonadmin');
    define('DBNAME', 'hazirli1_bilgeton');
    define('DBPWD', 'riozWAS-Fh6U');
}


?>