<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 30-Jan-19
 * Time: 03:23
 */

class User extends Controller
{
    protected $data;
    public function __construct($session)
    {
        parent::__construct($session);
        if($this->_session->isExist('user')){
            self::redirect("Account");
        }
        $this->data['nav'] = array("user" => $this->_session->get('user'),
            "nav" => $this->_model->getNavigationItems());
    }

    public function login(){
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('user/login');
        $this->_view->render('template/footer');
    }



    public function register(){
    $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
    $this->_view->render('user/register');
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