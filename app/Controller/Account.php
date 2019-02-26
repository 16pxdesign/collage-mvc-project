<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 12-Feb-19
 * Time: 05:24
 */

class Account extends Controller
{
    protected $data = null;
    public function __construct($session)
    {
        parent::__construct($session);
        $this->data['user'] = $this->_session->get('user');
        $this->data['role'] = $this->_session->get('role');
        if(empty($this->data['user'])){
            self::redirect("User/login");
        }
        $this->data['nav'] = array("user" => $this->_session->get('user'),
            "nav" => $this->_model->getNavigationItems(),
            "role" => $this->data['role'] );

    }

    public function index(){
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('account/user', $this->data['nav']);
        $this->_view->render('template/footer');
    }

    public function logout(){
        $this->_session->destroy();
        self::redirect();
    }
}