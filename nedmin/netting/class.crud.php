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

    // DB'den gelen anahtar değerlerini birleştirme metodu
    public function addValue($argse)
    {
        $values = implode(',', array_map(
            function ($item) {
                return $item . '=?';
            },
            array_keys($argse)
        ));
        return $values;
    }

    // Veri Ekleme Metodu
    public function insert($table, $values, $options = [])
    {
        try {
            unset($values[$options['form_name']]);

            if ($options['password']) {
                $values[$options['password']] = md5($values[$options['password']]);
            }
            // echo "<pre>";
            // print_r($values);
            // exit;

            $stmt = $this->db->prepare("INSERT INTO $table SET {$this->addValue($values)}");
            $stmt->execute(array_values($values));

            return ['status' => TRUE];
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }

    public function adminInsert($admins_username, $admins_name, $admins_surname, $admins_password, $admins_status)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO admins SET admins_username=?, admins_name=?, admins_surname=?, admins_password=?, admins_status=?");
            $stmt->execute([$admins_username, $admins_name, $admins_surname, md5($admins_password), $admins_status]);

            return ['status' => TRUE];
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
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
            $stmt->execute([
                $admins_username,
                md5($admins_password)
            ]);

            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['admins_status'] == 0) {
                    return ['status' => FALSE];
                    exit;
                }

                # SESSION ATAMASI
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
