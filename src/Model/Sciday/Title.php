<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Title extends DbSciDay {
    public function getAllTitle() {
        $sql = "
            SELECT *
            FROM tb_title
            ORDER BY id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }



}

?>