<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 15-Feb-19
 * Time: 13:58
 */

class CourseModel extends Model
{

    public function getCoursesList()
    {
        $sql = "select c.id, c.img, c.name, c.active, c.description from website.usercourse as uc
                inner join website.courses as c on uc.course_id = c.id
                where uc.user_id = 19;";
        return $this->db->run($sql);
    }
}