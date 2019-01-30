<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 30-Jan-19
 * Time: 03:23
 */

class User extends Controller
{
    public function __construct($session)
    {
        parent::__construct($session);
    }

    public function login(){

    }

    public function register(){
    $this->_view->render('template/header');
    $this->_view->render('register');
    }

    public function logout()
    {
        $this->_session->destroy();
        self::redirect('Index/');
    }

}