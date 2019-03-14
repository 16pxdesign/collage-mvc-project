<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 24-Feb-19
 * Time: 04:58
 */

class ManageModel extends Model
{
    public function getLesssons($id){
        $sql = "select * from website.lessons as l where course_id = ?
order by l.no asc ";

        $st = $this->db->prepare($sql);
        $st->execute(array($id));

        return $st->fetchAll();
    }

    public function getLessonContext($id){
        $sql = "select * from website.lessons
where id = ?";
        $st = $this->db->prepare($sql);
        $st->execute(array($id));
        return $st->fetch();
    }

    public function getCourseContext($id){
        $sql = "select * from website.courses
where id = ?";
        $st = $this->db->prepare($sql);
        $st->execute(array($id));
        return $st->fetch();
    }

    public function getCourses(){
        $sql = "select * from website.courses;";
        return $this->db->run($sql);
    }

    public function deleteCourse($id){
        $sql = "DELETE FROM `website`.`courses` WHERE `id`=" . $id . ";";
        $this->db->run($sql);
    }

    public function deleteLesson($id){
        $sql = "DELETE FROM `website`.`lessons` WHERE `id`=" . $id . ";";
        $this->db->run($sql);
    }
    public function nextLessonNo($id){
        $sql = "select `no` from `website`.`lessons` where `course_id`=? order by `no` desc limit 1";
        $st = $this->db->prepare($sql);
        $st->execute(array($id));
        $result = $st->fetch();
        $no = isset($result["no"])? $result["no"] : 0 ;
        var_dump($no);
        if($no>0){
            return $no+1;
            }
        else
            return 1;
    }
}