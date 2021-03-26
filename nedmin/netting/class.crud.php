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

            if (!empty($_FILES[$options['file_name']]['name'])) {

                $name_y = $this->imageUpload(
                    $_FILES[$options['file_name']]['name'],
                    $_FILES[$options['file_name']]['size'],
                    $_FILES[$options['file_name']]['tmp_name'],
                    $options['dir']
                );

                // resim dosyasının ismini ekle
                $values += [$options['file_name'] => $name_y];

                // print_r($values);
                // exit;

            }

            // parolayı şifrele
            if (isset($options['password'])) {
                $values[$options['password']] = md5($values[$options['password']]);
            }
            // buton name sil
            unset($values[$options['form_name']]);

            $stmt = $this->db->prepare("INSERT INTO $table SET {$this->addValue($values)}");
            $stmt->execute(array_values($values));

            return ['status' => TRUE];
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }
    // Veri Güncelleme Metodu
    public function update($table, $values, $options = [])
    {
        try {

            if (!empty($_FILES[$options['file_name']]['name'])) {

                $name_y = $this->imageUpload(
                    $_FILES[$options['file_name']]['name'],
                    $_FILES[$options['file_name']]['size'],
                    $_FILES[$options['file_name']]['tmp_name'],
                    $options['dir'],
                    $values[$options['file_delete']]
                );

                // resim dosyasının ismini ekle
                $values += [$options['file_name'] => $name_y];
                // print_r($values);
                // exit;


            }
            // Eski dosya değerini sil
            unset($values[$options['file_delete']]);

            // parolayı şifrele
            if (isset($options['password'])) {
                $values[$options['password']] = md5($values[$options['password']]);
            }
            // valuesExecute ekstra admins_id için
            $columns_id = $values[$options['columns']];
            unset($values[$options['form_name']]);
            unset($values[$options['columns']]);

            $valuesExecute = $values;
            $valuesExecute += [$options['columns'] => $columns_id];

            // echo "<pre>";
            // print_r($values);
            // echo "<pre>";
            // print_r($valuesExecute);
            // exit;

            $stmt = $this->db->prepare("UPDATE $table SET {$this->addValue($values)} WHERE {$options['columns']}=?");
            $stmt->execute(array_values($valuesExecute));

            return ['status' => TRUE];
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }

    // Silme İşlemleri (admins, users)
    public function delete($table, $columns, $values, $fileName = NULL)
    {
        try {
            if (!empty($fileName)) {
                unlink("dimg/$table/" . $fileName);
            }
            $stmt = $this->db->prepare("DELETE FROM $table WHERE $columns=?");
            $stmt->execute([htmlspecialchars($values)]);

            return ['status' => TRUE];
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }

    // Resim Güncelleme
    public function imageUpload($name, $size, $tmp_name, $dir, $file_delete = NULL)
    {
        try {
            $allowedExtensions = ['jpg', 'png', 'ico', 'jpge'];
            $ext = strtolower(substr($name, strpos($name, '.') + 1));

            if (in_array($ext, $allowedExtensions) === false) {
                throw new Exception('Bu dosya türü kabul edilmemektedir...');
            }

            if ($size > 1048576) {
                throw new Exception('Dosya boyutu çok büyük...');
            }

            $name_y = uniqid() . "." . $ext;

            if (!@move_uploaded_file($tmp_name, "dimg/$dir/$name_y")) {
                throw new Exception('Dosya yükleme hatası...');
            }

            if (!empty($file_delete)) {
                unlink("dimg/$dir/$file_delete");
            }
            // resim dosyasının adını döndür
            return $name_y;
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
                    // "admins_username" => $admins_username,
                    // "admins_name" => $row['admins_name'],
                    // "admins_surname" => $row['admins_surname'],
                    // "admins_file" => $row['admins_file'],
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

    // veri okuma
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

    // veri çekme
    public function wread($table, $columns, $values, $options = [])
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM $table WHERE $columns=?");
            $stmt->execute([htmlspecialchars($values)]);
            return $stmt;
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    // Harici SQL - Özelliştirilebilir 
    public function qSql($sql, $options = [])
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }
}
