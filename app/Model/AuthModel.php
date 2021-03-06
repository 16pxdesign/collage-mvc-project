<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 12-Feb-19
 * Time: 03:44
 */

class AuthModel extends Model
{
    public function createUser($user, $password, $email, $firstName, $lastName)
    {
        $st = $this->db->prepare("INSERT INTO `website`.`users` (`username`, `password`, `email`, `name`, `surname`) VALUES (?,?,?,?,?)");
        $st->execute(array($user, $password, $email, $firstName, $lastName));
        $st = null;
        return $this->db->lastInsertId();
    }

    public function validPassword($user, $password)
    {
        $st = $this->db->prepare("select * from website.users where username=? and password=?;");
        $st->execute(array($user, $password));
        if ($st->rowCount() > 0)
            return true;
        else
            return false;
    }

    public function isUserExist($user, $email)
    {
        $st = $this->db->prepare("select * from website.users where username=? or email=?;");
        $st->execute(array($user, $email));
        if ($st->rowCount() > 0)
            return true;
        else
            false;

    }

    public function getUser($user){
        $sql = "select * from website.users where id = ?";
        $st = $this->db->prepare($sql);
        $st->execute(array($user));
        return $st->fetch();
    }

    public function getUserOnLogin($user,$password){
        $sql = "select * from website.users where username = ? and password=?";
        $st = $this->db->prepare($sql);
        $st->execute(array($user,$password));
        return $st->fetch();
    }
}