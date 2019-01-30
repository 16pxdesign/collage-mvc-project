<?php

class Controller
{

    protected $_view;
    protected $_model;
    protected $_url;
    protected $_session;

    function __construct($session)
    {
        //init view
        $this->_view = new View();
        $this->_session = $session;

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


    public static function redirect($url = null)
    {

        $StringExplo = explode("/", $_SERVER['REQUEST_URI']);
        $HeadTo = $StringExplo[0] . "/" . $url;
        Header("Location: " . $HeadTo);

        exit;
    }

}

?>

