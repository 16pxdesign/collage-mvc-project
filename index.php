<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

ini_set("log_errors", 1);
ini_set("error_log", "./php-error.txt");
error_reporting(E_ALL);


define('DOCROOT', dirname(__FILE__));
//Import core
function autoload($class)
{
    //var_dump($class);
    $filename = DOCROOT . "/app/Helpers/" . $class . ".php";
    if(file_exists($filename)){
        require_once $filename;
    }
    $filename = DOCROOT . "/app/Core/" . $class . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    }

    $filename = DOCROOT . "/app/Controller/" . $class . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    }
    $filename = DOCROOT . "/app/Model/" . $class . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    }


}

spl_autoload_register("autoload");
$Bootstrap = new Bootstrap();
$Bootstrap->init();

?>