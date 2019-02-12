<?php

class Index extends Controller
{

    public function __construct($session)
    {
        parent::__construct($session);
    }


    public function index()
    {
        $this->_view->render('template/header');
        $this->_view->render('template/nav');
        $this->_view->render('index/home');
        $this->_view->render('template/footer');

    }

    public function ttt(){
        $this->_view->render('register');

    }


    public function set()
    {

        /*
                $header_data['session_user'] = $this->_session->get('user');
                $header_data['menu'] = $this->_model->topMenu();
                //user z sessji

                $this->_view->render('template/header', $header_data);
                $this->_view->render('test');
                $this->_view->render('template/footer');



                $this->_session->set('user', 'Scott');*/


        self::redirect(null);

    }

    public function logout()
    {
        $this->_session->destroy();
        self::redirect();
    }
}