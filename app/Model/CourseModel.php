<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 15-Feb-19
 * Time: 13:58
 */

class CourseModel extends Model
{

    public function getCoursesList($user_id)
    {
        $sql = "select c.id, c.img, c.name, c.active, c.description from website.usercourse as uc
                inner join website.courses as c on uc.course_id = c.id
                where uc.user_id = ".$user_id.";";
        return $this->db->run($sql);
    }
    public function isOwned($id,$user_id){
        $sql = "select count(*) as i from website.usercourse as uc
inner join website.lessons as l on uc.course_id = l.course_id
where uc.user_id = ? and uc.course_id = ?
order by l.no asc ";
        $st = $this->db->prepare($sql);
        $st->execute(array($user_id,$id));
        $result = $st->fetch();

        if($result['i']==0){
            return false;
        }else{
            return true;
        }

    }

    public function getLesssons($id,$user_id){
        $sql = "select uc.id, uc.id, uc.user_id, l.course_id, l.id as lessonid , l.no, l.name, l.content, l.course_id from website.usercourse as uc
inner join website.lessons as l on uc.course_id = l.course_id
where uc.user_id = ? and uc.course_id = ?
order by l.no asc ";

        $st = $this->db->prepare($sql);
        $st->execute(array($user_id,$id));

        return $st->fetchAll();
    }

    public function getLessonContext($id){
        $sql = "select * from website.lessons
where id = ?";
        $st = $this->db->prepare($sql);
        $st->execute(array($id));
        return $st->fetch();
    }
       public function getCourseID($id){
        $sql = "select course_id from website.lessons
where id = ?";
        $st = $this->db->prepare($sql);
        $st->execute(array($id));
         $arr = $st->fetch();
        return $arr['course_id'];
    }


}