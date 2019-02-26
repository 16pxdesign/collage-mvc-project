<?php
class Course extends Account
{
    private $manage = false;
    public function __construct($session)
    {
        parent::__construct($session);

        $this->data['manage'] = false;

    }

    public function index(){
        $this->data['shop'] = $this->_model->getCoursesList($this->_session->get('user_id'));
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('course/owned', array("shop" => $this->data['shop'], "nav" => $this->data['nav']));
        $this->_view->render('template/footer');
    }


    public function course($id){
        $this->data['owned'] = $this->_model->isOwned($id,$this->_session->get('user_id'));
        if(!$this->data['owned'])
            echo "Go shop";

        $this->data['lessons'] = $this->_model->getLesssons($id,$this->_session->get('user_id'));

        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('course/lessonslist', array( "lessons" => $this->data['lessons'], "manage" => false));
        $this->_view->render('template/footer');

    }

    public function lesson($id){
        $course_id = $this->_model->getCourseID($id);
        $this->data['owned'] = $this->_model->isOwned($course_id,$this->_session->get('user_id'));
        if(!$this->data['owned'])
            echo "Go shop";

        $this->data['lessoncontext'] = $this->_model->getLessonContext($id);

        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('course/lesson', $this->data['lessoncontext']);
        $this->_view->render('template/footer');
    }


}