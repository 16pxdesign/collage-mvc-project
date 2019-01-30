<?php

class Index extends Controller
{

    public function __construct($session)
    {
        parent::__construct($session);
    }


    public function index()
    {
        $header_data['session_user'] = $this->_session->get('user');
        $header_data['menu'] = $this->_model->topMenu();
        //user z sessji

        $this->_view->render('template/header', $header_data);
        $this->_view->render('test');
        $this->_view->render('template/footer');

    }

    public function set()
    {
        $this->_session->set('user', 'Scott');
        self::redirect('Index/');

    }

    public function logout()
    {
       $this->_session->destroy();
       self::redirect('Index/');
    }

    public function test(){
        $usermodel = new usermodel();
    }
}