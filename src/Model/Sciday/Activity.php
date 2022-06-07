<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Activity extends DbSciDay {

    public function getActivityByYear($year) {
        $sql = "
            SELECT 
                *
            FROM 
                tb_activity 
            WHERE
                year = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$year]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getActivityById($id) {
        $sql = "
            SELECT 
                *
            FROM 
                tb_activity 
            WHERE
                id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }


}

?>