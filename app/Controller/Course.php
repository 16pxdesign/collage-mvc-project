<?php
class Course extends Controller
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

    }

    public function index(){
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('template/footer');
    }
    public function owned(){
        $this->data['shop'] = $this->_model->getCoursesList();
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('course/owned', $this->data['shop']);
        $this->_view->render('template/footer');
    }

}