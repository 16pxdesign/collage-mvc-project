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
        $this->_model = new Model();
        $this->_view = new View();
        $this->_session = $session;
       URL::routeHist();
       // URL::show();

    }

    //import model
    public function _loadModel($model)
    {
        $path = 'app/Model/' . $model . '.php';

        if (file_exists($path)) {
            $this->_model = new $model();
        }
    }
    //import model
    public function getModel($model)
    {
        $path = 'app/Model/' . $model . '.php';

        if (file_exists($path)) {
            return new $model();
        }
        return null;
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

