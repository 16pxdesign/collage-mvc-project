<?php

class Bootstrap
{
    private $_url;
    private $_controller = 'Index';
    private $_method = 'index';
    private $_params = [];
    private $_session;

//SESION INIT

    // private $_defaultController;

    public function __construct()
    {

    }

    public function init()
    {
        $this->_session = new Session();
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

        $file = DOCROOT . '/app/Controller/' . $controler . '.php';

        if (file_exists($file)) {
            $this->_controller = new $controler($this->_session);
            //import model
            $this->_controller->_loadModel($controler . "Model");
        } else {
            //404
            echo "Not controller";
            //header('Location: ../1.php');
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
                $reflection = new ReflectionMethod($this->_controller, $this->_method);
                if ($reflection->isPublic()){
                    call_user_func_array([$this->_controller, $this->_method], $this->_params);

                }else{
                    //404
                    echo "Not public";
                }

            } else {
                //404
                echo "Not method";
                //header('Location: ../3.php');
            }
        } else {
            //404
           header('Location: ../2.php');
        }


    }


}

?>

