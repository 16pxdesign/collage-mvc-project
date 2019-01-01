<?php
class Index extends Controller {

    public function __construct(){
       parent::__construct();

    }
    public function index(){
        $this->_view->render('Index');
        echo("1");
    }

    public function test(){

        $this->_view->render('Index');
        echo("1");
    }

    public function test2(){


        var_dump("<hmtl>2</hmtl>");
    }
}
