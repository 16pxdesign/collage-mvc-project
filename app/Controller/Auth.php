<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 12-Feb-19
 * Time: 02:17
 */

class Auth extends Process
{

    public function __construct($session)
    {
        parent::__construct($session);
    }

    public function register()
    {

        $this->usernameValidation($_POST["username"]);
        $this->passwordValidation($_POST["password"]);
        $this->emailValidation($_POST["email"]);
        $this->passwordMatch($_POST["password"], $_POST["password2"]);
        $this->isUserExist($_POST["username"], $_POST["email"]);


        if (empty($this->errorMSG)) {
            $msg = $_POST["username"];
            $return = $this->_model->createUser($_POST["username"], md5($_POST["password"]), $_POST["email"], $_POST["firstname"], $_POST["lastname"]);
            if ($return == null) {
                echo json_encode(['code' => 404, 'msg' => "Server error"]);
                exit;
            }
            echo json_encode(['code' => 200, 'msg' => $_POST["username"]]);
            exit;
        }

        echo json_encode(['code' => 404, 'msg' => $this->errorMSG]);
        exit;


    }

    public function login()
    {
        $this->usernameValidation($_POST["username"]);
        $this->passwordValidation($_POST["password"]);
        $this->checkPassword($_POST["username"], $_POST["password"]);

        if (empty($this->errorMSG)) {

            $msg = $_POST["username"];
            $this->_session->set("user", $_POST["username"]);

            echo json_encode(['code' => 200, 'msg' => $msg]);
            exit;
        }

        echo json_encode(['code' => 404, 'msg' => $this->errorMSG]);
    }

    private function usernameValidation($data)
    {
        /* USERNAME VALIDATION */
        $val = new Validation();
        $val->name('username')
            ->value($data)
            ->required()
            ->pattern('text')
            ->max(20)
            ->min(3);
        if (!$val->isSuccess())
            $this->errorMSG .= "<p>" . $val->getErrorsFirst() . "</p>";
    }

    private function passwordValidation($data)
    {
        /* PASSWORD VALIDATION */
        $val = new Validation();
        $val->name('password')
            ->value($data)
            ->required()
            ->pattern('text')
            ->max(20)
            ->min(6);
        if (!$val->isSuccess())
            $this->errorMSG .= "<p>" . $val->getErrorsFirst() . "</p>";
    }

    private function emailValidation($data)
    {
        /* EMAIL VALIDATION */
        $val = new Validation();
        $val->name('email')
            ->value($data)
            ->required()
            ->pattern('email')
            ->max(50)
            ->min(5);
        if (!$val->isSuccess())
            $this->errorMSG .= "<p>" . $val->getErrorsFirst() . "</p>";
    }

    public function checkPassword($user, $password)
    {
        if (!$this->_model->validPassword($user, md5($password)))
            $this->errorMSG .= "Password or username incorect";
    }

    public function passwordMatch($p1, $p2)
    {
        if ($p1 != $p2)
            $this->errorMSG .= "Password not match";
    }

    public function isUserExist($user, $email)
    {
        if ($this->_model->isUserExist($user, $email))
            $this->errorMSG .= "User exist";
    }

}