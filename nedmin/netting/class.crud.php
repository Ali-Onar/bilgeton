<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once 'dbConfig.php';
// CRUD Sınıfı

class CRUD
{
    private $db;
    private $dbhost = DBHOST;
    private $dbuser = DBUSER;
    private $dbname = DBNAME;
    private $dbpassword = DBPWD;

    # DB Bağlantısı
    function __construct()
    {
        try {
            $this->db = new PDO(
                'mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname . ';charset=utf8',
                $this->dbuser,
                $this->dbpassword
            );
            // echo "bağlantı başarılı";

        } catch (Exception $e) {
            die('Bağlantı başarısız' . $e->getMessage());
        }
    }

    # Login'den iki parametre gelecek
    # execute : gelen veri ile DB'deki veriyi karşılaştır
    # fetch : sütuna göre veri çek
    # $row['...'] = $admincek['...']

    public function adminsLogin($admins_username, $admins_password)
    {
        try {

            $stmt = $this->db->prepare('SELECT * FROM admins WHERE admins_username=? and admins_password=?');
            $stmt->execute([$admins_username, md5($admins_password)]);

            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                $_SESSION["admins"] = [
                    "admins_username" => $admins_username,
                    "admins_name" => $row['admins_name'],
                    "admins_surname" => $row['admins_surname'],
                    "admins_file" => $row['admins_file'],
                    "admins_id" => $row['admins_id']
                ];
                return ['status' => TRUE];
            } else {
                return ['status' => FALSE];
            }
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }
}
