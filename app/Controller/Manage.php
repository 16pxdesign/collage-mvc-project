<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 15-Feb-19
 * Time: 14:12
 */

class Manage extends Controller
{
    public function __construct($session)
    {
        parent::__construct($session);
        $this->data['user'] = $this->_session->get('user');
        if(empty($this->data['user'])){
            self::redirect("User/login");
        }
        $this->data['nav'] = array("user" => $this->_session->get('user'),
            "nav" => $this->_model->getNavigationItems());
        //check user role
        if($this->_session->get('role')<UserRole::EDITOR){
            $this->_view->render('template/header');
            $this->_view->render('template/nav', $this->data['nav']);
            echo "Do not have Access, ask administrator for permition";
            $this->_view->render('template/footer');
        }
    }

    public function index(){

    }

}