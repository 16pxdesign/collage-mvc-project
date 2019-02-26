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

    public function getCourses(){
        $sql = "select * from website.courses;";
        return $this->db->run($sql);
    }

}