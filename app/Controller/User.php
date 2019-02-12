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
        if($this->_session->isExist('user')){
            self::redirect("Account");
        }
    }

    public function login(){
        $this->_view->render('template/header');
        $this->_view->render('template/nav');
        $this->_view->render('login');
        $this->_view->render('template/footer');
    }



    public function register(){
    $this->_view->render('template/header');
    $this->_view->render('template/nav');
    $this->_view->render('register');
    $this->_view->render('template/footer');

    }

    public function logout()
    {
        $this->_session->destroy();
        self::redirect();
    }

    public function enum(){
        echo UserRole::EDITOR;
    }

    public function m(){

        $newmodel = $this->getModel('child');
        $newmodel->text();
    }

}