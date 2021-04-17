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

            if (isset($options['slug'])) {
                if (empty($values[$options['slug']])) {
                    $values[$options['slug']] = $this->seo($values[$options['title']]);
                } else {
                    $values[$options['slug']] = $this->seo($values[$options['slug']]);
                }
            }

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
                if (!empty($values[$options['password']])) {
                    $values[$options['password']] = md5($values[$options['password']]);
                } else {
                    unset($values[$options['password']]);
                }
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

            if (isset($options['slug'])) {
                if (empty($values[$options['slug']])) {
                    $values[$options['slug']] = $this->seo($values[$options['title']]);
                } else {
                    $values[$options['slug']] = $this->seo($values[$options['slug']]);
                }
            }

            if (!empty($_FILES[$options['file_name']]['name'])) {

                $name_y = $this->imageUpload(
                    $_FILES[$options['file_name']]['name'],
                    $_FILES[$options['file_name']]['size'],
                    $_FILES[$options['file_name']]['tmp_name'],
                    $options['dir'],
                    $values[$options['file_delete']]
                );

                //EKLENEN KISIM BAŞLANGIÇ
                if (!$name_y) {
                    return ['status' => FALSE, 'error' => $name_y['error']];
                    exit;
                } else {
                    $values += [$options['file_name'] => $name_y];
                }
                //EKLENEN KISIM BİTİŞ

                // resim dosyasının ismini ekle
                // $values += [$options['file_name'] => $name_y];
                // print_r($values);
                // exit;

            }
            // Eski dosya değerini sil
            unset($values[$options['file_delete']]);

            // parolayı şifrele
            if (isset($options['password'])) {
            if ($values[$options['password']]) {
                $values[$options['password']] = md5($values[$options['password']]);
            } else {
                unset($values[$options['password']]);
            }
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

            if ($stmt->rowCount() > 0) {
                return ['status' => TRUE];
            } else {
                throw new Exception('İşlem Başarısız');
            }
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }


    public function orderUpdate($table, $values, $options = [])
    {
        try {

            $columns_id = $values[$options['columns']];
            unset($values[$options['form_name']]);
            unset($values[$options['columns']]);

            $valuesExecute = $values;
            $valuesExecute += [$options['columns'] => $columns_id];

            $stmt = $this->db->prepare("UPDATE $table SET {$this->addValue($values)} WHERE {$options['columns']}=?");
            $stmt->execute(array_values($valuesExecute));

            if ($stmt->rowCount() > 0) {
                return ['status' => TRUE];
            } else {
                throw new Exception('İşlem Başarısız');
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }

    public function ajaxUpdate($table, $values, $columns, $orderId)
    {


        try {

            foreach ($values as $key => $value) {

                $stmt = $this->db->prepare("UPDATE $table SET $columns=? WHERE $orderId=?");
                $stmt->execute([$key, $value]);
            }

            return ['status' => TRUE];
        } catch (PDOException $e) {
            echo $e->getMessage();
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

            if (!@move_uploaded_file($tmp_name, "$dir/$name_y")) {
                throw new Exception('Dosya yükleme hatası...');
            }

            if (!empty($file_delete)) {
                unlink("$dir/$file_delete");

                // if (strstr($dir, "admins")) {
                //     $_SESSION['admins']['admins_file'] = $name_y;
                // }
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

    public function usersLogin($users_mail, $users_password)
    {
        try {

            $stmt = $this->db->prepare('SELECT * FROM users WHERE users_mail=? and users_password=?');
            $stmt->execute([
                $users_mail,
                md5($users_password)
            ]);

            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($row['users_status'] == 0) {
                    return ['status' => FALSE];
                    exit;
                }

                # SESSION ATAMASI
                $_SESSION["users"] = [
                    // "users_username" => $users_username,
                    // "users_name" => $row['users_name'],
                    // "users_surname" => $row['users_surname'],
                    // "users_file" => $row['users_file'],
                    "users_id" => $row['users_id']
                ];
                return ['status' => TRUE];
            } else {
                return ['status' => FALSE];
            }
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }

    public function usersRegister($users_name, $users_mail, $users_password1, $users_password2, $row_user, $row_mail, $options)
    {
        try {


            if ($users_name == $row_user || $users_mail == $row_mail) {
                throw new Exception('İsim veya mail kullanılıyor, kayıt başarısız..!');
            }

            if ($users_password1 != $users_password2) {
                throw new Exception('Parolalar uyuşmuyor, kayıt başarısız...');
            } else if ($users_password1 == $users_password2) {
                $users_password = $users_password1;
            }

            if (strlen($users_password) < 6) {
                throw new Exception('Parolanız 6 haneden fazla olmalıdır, kayıt başarısız..!');
            }

            if (isset($options['slug'])) {
                if (empty($_POST[$options['slug']])) {
                    $_POST[$options['slug']] = $this->seo($users_name);
                }
            }

            $stmt = $this->db->prepare("INSERT INTO users SET users_name=?, users_mail=?, users_password=?, users_status=?, users_slug=?");
            $stmt->execute([$users_name, $users_mail, md5($users_password), 1, $_POST[$options['slug']]]);

            return ['status' => TRUE];
        } catch (Exception $e) {
            return ['status' => FALSE, 'error' => $e->getMessage()];
        }
    }

    // veri okuma
    // public function read($table)
    // {
    //     try {
    //         $stmt = $this->db->prepare("SELECT * FROM $table");
    //         $stmt->execute();
    //         return $stmt;
    //     } catch (Exception $e) {
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }

    public function read($table, $options = [])
    {
        try {
            if (isset($options['columns_name']) && empty($options['limit'])) {
                $stmt = $this->db->prepare("SELECT * FROM $table order by {$options['columns_name']} {$options['columns_sort']}");
            } else if (isset($options['columns_name']) && isset($options['limit'])) {
                $stmt = $this->db->prepare("SELECT * FROM $table order by {$options['columns_name']} {$options['columns_sort']} limit {$options['limit']}");
            } else {
                $stmt = $this->db->prepare("SELECT * FROM $table");
            }
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

    // veri çekme blog detay
    public function wreadBlog($sql, $values)
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$values]);
            return $stmt;
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    // Harici SQL - Özelliştirilebilir 
    public function qSql($sql, $idName = null, $idValue = null)
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$idName => $idValue]);
            return $stmt;
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    public function search($sql, $options = [])
    {
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute(["%$options%"]);
            return $stmt;
        } catch (Exception $e) {
            return ['status' => false, 'error' => $e->getMessage()];
        }
    }

    // public function orderUpdate($table, $values, $columns=[], $orderID)
    // {
    //     try {
    //         foreach ($values as $key => $value) {

    //             $stmt = $this->db->prepare("UPDATE $table SET $columns=? WHERE $orderID=?");
    //             $stmt->execute([$key, $value]);
    //         }
    //         return ['status' => TRUE];
    //     } catch (PDOException $e) {
    //         echo $e->getMessage();
    //         return ['status' => FALSE, 'error' => $e->getMessage()];
    //     }
    // }

    public function tDate($date, $options = [])
    {
        $arg = explode(" ", $date);
        $date = explode("-", $arg[0]);
        $time = $arg[1];

        if ($options['date']) {
            return $date[2] . "-" . $date[1] . "-" . $date[0];
        } else if ($options['time']) {
            return $time;
        } else if ($options['date_time']) {
            return $date[2] . "-" . $date[1] . "-" . $date[0] . " " . $time;
        }
    }

    public function seo($str, $options = array())
    {
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true
        );
        $options = array_merge($defaults, $options);
        $char_map = array(
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        $str = trim($str, $options['delimiter']);
        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }
}
