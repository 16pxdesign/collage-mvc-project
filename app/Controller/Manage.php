<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 15-Feb-19
 * Time: 14:12
 */

class Manage extends Account
{
    public function __construct($session)
    {
        parent::__construct($session);

        //check user role
        if($this->_session->get('role')<UserRole::EDITOR){
            $this->_view->render('template/header');
            $this->_view->render('template/nav', $this->data['nav']);
            echo "Do not have Access, ask administrator for permition";
            $this->_view->render('template/footer');
        }
    }

    public function index(){
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('course/test');
        $this->_view->render('template/footer');
    }

}