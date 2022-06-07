<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Imagespath extends DbSciDay {
    public function InsertImagespath($imagespath) {
        $sql = "
            INSERT INTO tb_images (
                id, 
                images_id, 
                images_path, 
                project_id
            ) VALUES (
                NULL, 
                :images_id, 
                :images_path, 
                :project_id
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($imagespath);
        return $this->pdo->lastInsertId();

    }



}

?>