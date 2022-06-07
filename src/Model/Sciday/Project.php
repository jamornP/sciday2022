<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Project extends DbSciDay {
    public function InsertProject($project) {
        $sql = "
            INSERT INTO tb_project (
                id, 
                project_name, 
                level_id,
                school, 
                student_id, 
                teacher_id, 
                file_register, 
                images_id,
                user_id, 
                year
            )VALUES (
                NULL,
                :project_name, 
                :level_id,
                :school,
                :student_id,
                :teacher_id,
                :file_register,
                :images_id,
                :user_id,
                '2022'
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($project);
        return $this->pdo->lastInsertId();

    }
    public function getAllProject() {
        $sql = "
            SELECT 
                p.id,
                p.project_name,
                l.name AS level,
                p.school,
                p.student_id,
                p.teacher_id,
                p.file_register,
                p.images_id,
                p.user_id
            FROM
                tb_project AS p
                LEFT JOIN tb_level AS l ON p.level_id = l.id 
            ORDER BY 
                date_at
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getProjectByLevel($level) {
        $sql = "
            SELECT 
                p.id,
                p.project_name,
                l.name AS level,
                p.school,
                p.student_id,
                p.teacher_id,
                p.file_register,
                p.images_id,
                p.user_id
            FROM
                tb_project AS p
                LEFT JOIN tb_level AS l ON p.level_id = l.id 
            WHERE
                p.level_id = ?
            ORDER BY 
                date_at
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$level]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getProjectById($id) {
        $sql = "
            SELECT 
                p.id,
                p.project_name,
                l.name AS level,
                p.level_id,
                p.school,
                p.student_id,
                p.teacher_id,
                p.file_register,
                p.images_id,
                p.user_id
            FROM
                tb_project AS p
                LEFT JOIN tb_level AS l ON p.level_id = l.id 
            WHERE
                p.id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data[0];
    }
    public function getProjectByUser($user) {
        $sql = "
            SELECT 
                p.id,
                p.project_name,
                l.name AS level,
                p.school,
                p.student_id,
                p.teacher_id,
                p.file_register,
                p.images_id,
                p.user_id
            FROM
                tb_project AS p
                LEFT JOIN tb_level AS l ON p.level_id = l.id 
            WHERE
                p.user_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function UpdateProject($project) {
        $sql = "
            UPDATE 
                tb_project 
            SET 
                project_name = :project_name,
                level_id = :level_id,
                school = :school,
                student_id = :student_id,
                teacher_id = :teacher_id,
                file_register = :file_register,
                images_id = :images_id
                
            WHERE 
                id= :project_id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($project);
        return true;

    }

}

?>