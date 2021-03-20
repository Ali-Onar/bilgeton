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

    public function adminsLogin($admins_username, $admins_password, $remember_me)
    {
        try {

            $stmt = $this->db->prepare('SELECT * FROM admins WHERE admins_username=? and admins_password=? and admins_status=?');

            // Beni Hatırla decrypt başlangıç 
            if (isset($_COOKIE['adminsLogin'])) {
                $stmt->execute([$admins_username, md5(openssl_decrypt($admins_password, "AES-128-ECB", "admins_key")), 1]);
            } else {
                $stmt->execute([$admins_username, md5($admins_password), 1]);
            }
            // Beni Hatırla decrypt bitiş 

            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                # SESSION ATAMASI
                $_SESSION["admins"] = [
                    "admins_username" => $admins_username,
                    "admins_name" => $row['admins_name'],
                    "admins_surname" => $row['admins_surname'],
                    "admins_file" => $row['admins_file'],
                    "admins_id" => $row['admins_id']
                ];

                // Beni Hatırla encrypt Başlangıç
                # checkbox - Beni hatırla dolu geldiğinde yapılacak işlemler
                # openssql_encrypt şifrelemesi => data, method, key
                if (!empty($remember_me) and empty($_COOKIE['adminsLogin'])) {
                    $admins = [
                        "admins_username" => $admins_username,
                        "admins_password" => openssl_encrypt($admins_password, "AES-128-ECB", "admins_key")
                    ];
                    setcookie("adminsLogin", json_encode($admins), strtotime("+30 day"), "/");
                } else if (empty($remember_me)) {
                    setcookie("adminsLogin", json_encode($admins), strtotime("-30 day"), "/");
                }
                // Beni Hatırla encrypt Bitiş

                return ['status' => TRUE];
            } else {
                return ['status' => FALSE];
            }
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }

    public function read($table)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt;

        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
