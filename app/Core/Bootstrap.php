<?php

class Bootstrap
{
    private $_url;
    private $_controller = 'index';
    private $_method = 'index';
    private $_params = [];

    // private $_defaultController;

    public function __construct()
    {
    }

    public function init()
    {

//SESION INIT
        $this->_getUrl();
        $this->_loadControler();
        $this->_loadMethod();


    }

    protected function _getUrl()
    {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : NULL;
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);

    }

    protected function _loadControler()
    {

        //set controler
        $controler = $this->_controller;
        if (!empty($this->_url[0])) {
            $controler = $this->_url[0];
            unset($this->_url[0]);
        }

        //import controler
        $file = 'app/Controller/' . $controler . '.php';
        if (file_exists($file)) {
            require_once $file;


            $this->_controller = new $controler;
            //import model
            $this->_controller->_loadModel($controler);
        } else {
            header('Location: ../404.php');
        }


    }

    protected function _loadMethod()
    {

        //set method
        if (!empty($this->_url[1])) {
            $this->_method = $this->_url[1];
            unset($this->_url[1]);
        }
        //fetch params
        $this->_params = $this->_url ? array_values($this->_url) : [];

        //checking and calling method
        if (!empty($this->_method)) {
            if (method_exists($this->_controller, $this->_method)) {
                call_user_func_array([$this->_controller, $this->_method], $this->_params);

            } else {
               header('Location: ../404.php');
            }
        } else {
           header('Location: ../404.php');
        }


    }


}

?>

