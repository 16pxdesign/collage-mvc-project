<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 28-Feb-19
 * Time: 10:09
 */

class ProcessManageModel extends Model
{
    public function addCourse($name, $img, $desc, $price, $active){
        $sql = "INSERT INTO `website`.`courses` (`name`, `img`, `description`, `price`, `active`) VALUES (?,?,?,?,?)";
        $st = $this->db->prepare($sql);
        $st->execute(array($name,$img,$desc,$price,$active));
        if ($this->db->lastInsertId())
            return true;

        return false;
    }
    public function updateCourse($id,$name, $img, $desc, $price, $active){
        $sql = "UPDATE `website`.`courses` SET `name`=?, `img`=?, `description`=?, `price`=?, `active`=? where id=?";
        $st = $this->db->prepare($sql);
        $st->execute(array($name,$img,$desc,$price,$active,$id));

        return true;
    }

    public function addLesson($no, $name, $content, $course_id, $url){
        $sql = "INSERT INTO `website`.`lessons` (`no`, `name`, `content`, `course_id`, `url`) VALUES (?,?,?,?,?)";
        $st = $this->db->prepare($sql);
        $st->execute(array($no, $name, $content, $course_id, $url));

        if ($this->db->lastInsertId())
            return true;

        return false;
    }


    public function updateLesson($no, $name, $content, $course_id, $url, $id){
        $sql = "UPDATE `website`.`lessons` SET `no`=?, `name`=?, `content`=?, `url`=? where id=?";
        $st = $this->db->prepare($sql);
        $st->execute(array($no, $name, $content, $url, $id));

        return true;
    }

}