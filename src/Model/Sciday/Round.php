<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Round extends DbSciDay {
    public function InsertRound($data) {
        $sql = "
            INSERT INTO tb_round (
                id, 
                project_id, 
                activity_id, 
                level_id, 
                link_video, 
                num,
                score
            ) VALUES (
                NULL, 
                :project_id, 
                :activity_id, 
                :level_id, 
                :link_video, 
                :num,
                NULL
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();

    }
    public function getRound2ByLevel($level) {
        $sql = "
        SELECT
            p.id, 
            p.project_name,
            p.school,
            p.student_id,
            p.teacher_id,
            p.file_register,
            p.user_id,
            l.name,
            r.num,
            r.link_video,
            r.score 
        FROM 
            tb_round AS r
            LEFT JOIN tb_project AS p ON r.project_id = p.id
            LEFT JOIN tb_level AS l ON r.level_id = l.id
        WHERE
            r.level_id = ? AND r.num = 2
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$level]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function checkRound2ById($id) {
        $sql = "
        SELECT
            p.id, 
            p.project_name,
            p.school,
            p.student_id,
            p.teacher_id,
            p.file_register,
            p.user_id,
            l.name,
            r.num,
            r.link_video,
            r.score 
        FROM 
            tb_round AS r
            LEFT JOIN tb_project AS p ON r.project_id = p.id
            LEFT JOIN tb_level AS l ON r.level_id = l.id
        WHERE
            r.project_id = ? AND r.num = 2
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchColumn();
        if($data>0){
            return true;
        }else{
            return false;
        }
        
    }
    public function getRound2ById($id) {
        $sql = "
        SELECT
            p.id, 
            p.project_name,
            p.school,
            p.student_id,
            p.teacher_id,
            p.file_register,
            p.user_id,
            l.name,
            r.num,
            r.link_video,
            r.score 
        FROM 
            tb_round AS r
            LEFT JOIN tb_project AS p ON r.project_id = p.id
            LEFT JOIN tb_level AS l ON r.level_id = l.id
        WHERE
            r.project_id = ? AND r.num = 2
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
        
    }

    public function getRound3ByLevel($level) {
        $sql = "
        SELECT
            p.id, 
            p.project_name,
            p.school,
            p.student_id,
            p.teacher_id,
            p.file_register,
            p.user_id,
            l.name,
            r.num,
            r.link_video 
        FROM 
            tb_round AS r
            LEFT JOIN tb_project AS p ON r.project_id = p.id
            LEFT JOIN tb_level AS l ON r.level_id = l.id
        WHERE
            r.level_id = ? AND r.num = 3
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$level]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function checkRound3ById($id) {
        $sql = "
        SELECT
            p.id, 
            p.project_name,
            p.school,
            p.student_id,
            p.teacher_id,
            p.file_register,
            p.user_id,
            l.name,
            r.num,
            r.link_video 
        FROM 
            tb_round AS r
            LEFT JOIN tb_project AS p ON r.project_id = p.id
            LEFT JOIN tb_level AS l ON r.level_id = l.id
        WHERE
            r.project_id = ? AND r.num = 3
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchColumn();
        if($data>0){
            return true;
        }else{
            return false;
        }
        
    }
public function getRound3ById($id) {
        $sql = "
        SELECT
            p.id, 
            p.project_name,
            p.school,
            p.student_id,
            p.teacher_id,
            p.file_register,
            p.user_id,
            l.name,
            r.num,
            r.link_video,
            r.score 
        FROM 
            tb_round AS r
            LEFT JOIN tb_project AS p ON r.project_id = p.id
            LEFT JOIN tb_level AS l ON r.level_id = l.id
        WHERE
            r.project_id = ? AND r.num = 3
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
        
    }
    public function getRoundById($id,$num) {
        $sql = "
        SELECT
            p.id, 
            p.project_name,
            p.school,
            p.student_id,
            p.teacher_id,
            p.file_register,
            p.user_id,
            l.name,
            r.num,
            r.link_video 
        FROM 
            tb_round AS r
            LEFT JOIN tb_project AS p ON r.project_id = p.id
            LEFT JOIN tb_level AS l ON r.level_id = l.id
        WHERE
            r.project_id = ? AND r.num = '".$num."' 
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data;
        
    }
    public function UpdateVideo($data) {
        $sql = "
        UPDATE 
            tb_round 
        SET 
            link_video= :link_video
        WHERE     
            project_id= :project_id 
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return true;

    }

}