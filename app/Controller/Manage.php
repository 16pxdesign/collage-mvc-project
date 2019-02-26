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
        if ($this->_session->get('role') < UserRole::EDITOR) {
            $this->_view->render('template/header');
            $this->_view->render('template/nav', $this->data['nav']);
            echo "Do not have Access, ask administrator for permition";
            $this->_view->render('template/footer');
            die;
        }
    }

    public function index()
    {
        $this->data['all'] = $this->_model->getCourses();

        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('manage/courses', array("all" => $this->data['all'], "nav" => $this->data['nav']));
        $this->_view->render('template/footer');
    }


    public function course($action, $id=false)
    {
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);

        switch ($action){
            case "view":
                $this->data['lessons'] = $this->_model->getLesssons($id);
                $this->_view->render('course/lessonslist', array("lessons" => $this->data['lessons'], "manage" => true));
                break;
            case "add":
                break;
            case "edit":
                break;
            case "delete":

                break;

        }



        $this->_view->render('template/footer');

    }

    public function lesson($action, $id=false)
    {
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);


        switch ($action) {
            case "view":
                $this->data['lessoncontext'] = $this->_model->getLessonContext($id);
                $this->_view->render('course/lesson', $this->data['lessoncontext']);
                break;
            case "add":
                break;
            case "edit":
                break;
            case "delete":
                break;

        }

        $this->_view->render('template/footer');

    }


}