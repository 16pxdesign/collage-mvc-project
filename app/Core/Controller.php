<?php

class Controller
{

    protected $_view;
    protected $_model;
    protected $_url;

    function __construct()
    {
        //init view
        $this->_view = new view();
    }

    //import model
    public function _loadModel($model)
    {
        $path = 'app/Model/' . $model . '.php';

        if (file_exists($path)) {
            require_once $path;
            $this->_model = new $model();
        }
    }

    //get url
    protected function _getUrl()
    {
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : NULL;
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

}

?>

