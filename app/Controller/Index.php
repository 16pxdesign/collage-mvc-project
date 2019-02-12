<?php

class Index extends Controller
{

    public function __construct($session)
    {
        parent::__construct($session);
    }


    public function index()
    {
        $data['user'] = $this->_session->get('user');

        $this->_view->render('template/header');
        $this->_view->render('template/nav', $data);
        $this->_view->render('index/home');
        $this->_view->render('template/footer');

    }



}