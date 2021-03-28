<?php



// public function update($table, $values, $options = [])
//     {
 
//         try {
 
 
//             if (isset($options['slug'])) {
 
//                 if (empty($values[$options['slug']])) {
//                     $values[$options['slug']] = $this->seo($values[$options['title']]);
//                 } else {
//                     $values[$options['slug']] = $this->seo($values[$options['slug']]);
//                 }
//             }
 
//             if (!empty($_FILES[$options['file_name']]['name'])) {
 
//                 $name_y = $this->imageUpload(
//                     $_FILES[$options['file_name']]['name'],
//                     $_FILES[$options['file_name']]['size'],
//                     $_FILES[$options['file_name']]['tmp_name'],
//                     $options['dir'],
//                     $values[$options['file_delete']]
//                 );
 
//                 if (!$name_y['status']) {
//                     return ['status' => FALSE, 'error' => $name_y['error']];
//                     exit;
//                 } else {
//                     $values += [$options['file_name'] => $name_y];
//                 }
 
//             }
 
//             //Eski Resim Dosyasının Değerini Temizleme...
//             unset($values[$options['file_delete']]);
 
 
//             if (!empty($values[$options['pass']])) {
//                 $values[$options['pass']] = md5($values[$options['pass']]);
//                setcookie("adminsLogin", json_encode($admins), strtotime("-30 day"), "/");
 
//             } else {
//                 unset($values[$options['pass']]);
//             }
 
//             $columns_id = $values[$options['columns']];
//             unset($values[$options['form_name']]);
//             unset($values[$options['columns']]);
//             $valuesExecute = $values;
//             $valuesExecute += [$options['columns'] => $columns_id];
 
 
//             $stmt = $this->db->prepare("UPDATE $table SET {$this->addValue($values)} WHERE {$options['columns']}=?");
//             $stmt->execute(array_values($valuesExecute));
 
//             if ($stmt->rowCount() > 0) {
//                 return ['status' => TRUE];
//             } else {
//                 throw new Exception('İşlem Başarısız');
//             }
 
//         } catch (Exception $e) {
 
//             return ['status' => FALSE, 'error' => $e->getMessage()];
//         }
 
//     }