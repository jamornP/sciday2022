<?php
namespace App\Model\Sciday;

use App\Database\DbSciDay;

class Student extends DbSciDay {
    public function InsertStudent($student) {
        $sql = "
            INSERT INTO tb_student (
                id,
                student_id,
                stitle, 
                sname, 
                ssurname, 
                project_id, 
                school
            ) VALUES (
                NULL, 
                :student_id, 
                :stitle, 
                :sname, 
                :ssurname, 
                :project_id, 
                :school
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($student);
        return $this->pdo->lastInsertId();

    }
    public function getStuByProject($project) {
        $sql = "
            SELECT 
                id,
                project_name,
                school,
                student_id,
                teacher_id,
                images_id
            FROM
                tb_project
            GROUP BY 
                project_name
            ORDER BY 
                id
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function getStuById($id) {
        $sql = "
        SELECT 
            t.name AS stitle,
            t.id AS stitle_id,
            s.sname,
            s.ssurname,
            s.id AS sid
        FROM 
            tb_student AS s 
            LEFT JOIN tb_title AS t ON s.stitle = t.id
        WHERE 
            s.student_id = ?
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        return $data;
    }
    public function UpdateStudent($student) {
        $sql = "
        UPDATE 
            tb_student 
        SET 
            stitle= :stitle,
            sname= :sname,
            ssurname= :ssurname 
        WHERE 
            id= :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($student);
        return true;

    }

}

?>