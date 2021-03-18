<?php

require_once 'dbConfig.php';
// CRUD Sınıfı

class crud
{
    private $db;
    private $dbhost = DBHOST;
    private $dbuser = DBUSER;
    private $dbname = DBNAME;
    private $dbpassword = DBPWD;

    function __construct()
    {
        try {
            // DB Bağlantısı
            $this->db = new PDO(
                'mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname . ';charset=utf8',
                $this->dbuser,
                $this->dbpassword
            );
            # echo "bağlantı başarılı";

        } catch (Exception $e) {
            die('Bağlantı başarısız' . $e->getMessage());
        }
    }
}
