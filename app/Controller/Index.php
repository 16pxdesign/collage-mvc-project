<?php

class Index extends Controller
{
    protected $data;

    public function __construct($session)
    {
        parent::__construct($session);
        $this->data['nav'] = array("user" => $this->_session->get('user'),
            "nav" => $this->_model->getNavigationItems());

    }


    public function index()
    {


        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('index/home');
        $this->_view->render('template/footer');

    }

    public  function shop(){

        //var_dump($this->_model->getCoursesList());
        $this->data['shop'] = $this->_model->getCoursesList();
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('index/shop', $this->data['shop']);
        $this->_view->render('template/footer');
    }

    public function contact(){
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('index/contact');
        $this->_view->render('template/footer');
    }

    public function about(){
        $this->_view->render('template/header');
        $this->_view->render('template/nav', $this->data['nav']);
        $this->_view->render('index/about');
        $this->_view->render('template/footer');
    }


}