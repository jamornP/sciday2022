<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Image extends DbSciDay {
    public function getImageById($id) {
        $sql = "
            SELECT * 
            FROM
                tb_images
            WHERE
                images_id = ?
            
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    // public function getLevelById($id) {
    //     $sql = "
    //         SELECT * 
    //         FROM
    //             tb_level
    //         WHERE
    //             id = ?
    //     ";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute([$id]);
    //     $data = $stmt->fetchAll();
    //     return $data[0];
    // }
}

?>