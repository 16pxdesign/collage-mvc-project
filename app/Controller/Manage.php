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
                $this->_view->render('manage/lessonslist',
                    array("course_id" => $id,
                        "lessons" => $this->data['lessons'],
                        "manage" => true,
                        "nav" => $this->data['nav']));
                break;
            case "add":
                $this->_view->render('manage/add_course', array("nav" => $this->data['nav']));
                break;
            case "edit":
                $course = $this->_model->getCourseContext($id);
                $this->_view->render('manage/edit_course', array("nav" => $this->data['nav'], "course" => $course));
                break;
            case "delete":
                $this->_model->deleteCourse($id);
                self::redirect("Manage/index");
                break;

        }



        $this->_view->render('template/footer');

    }

    public function lesson($action, $id=false,$url = false)
    {
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);


        switch ($action) {
            case "view":
                $this->data['lessoncontext'] = $this->_model->getLessonContext($id);
                $this->_view->render('course/lesson', $this->data['lessoncontext']);
                break;
            case "add":
                $no = $this->_model->nextLessonNo($id);
                $this->_view->render('manage/add_lesson', array(
                    "course_id" => $id,
                    "no" => $no,
                    "nav" => $this->data['nav']));
                break;
            case "edit":
                if(!$url)
                    $url = "Mamage/index";

                $lesson = $this->_model->getLessonContext($id);
                $no = $lesson["no"];
                $this->_view->render('manage/edit_lesson',
                    array(
                        "lesson" => $lesson,
                    "back_url" => $url,
                    "course_id" => $id,
                    "no" => $no,
                    "nav" => $this->data['nav']));
                break;
            case "delete":
                $this->data['lessoncontext'] = $this->_model->getLessonContext($id);
                $back = $this->data['lessoncontext']['course_id'];
                $this->_model->deleteLesson($id);
                self::redirect("Manage/course/view/".$back);
                break;

        }

        $this->_view->render('template/footer');

    }


}