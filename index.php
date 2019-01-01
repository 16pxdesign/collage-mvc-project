<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('DOCROOT', dirname(__FILE__));

//Import core
function autoload($class)
{
    $filename = DOCROOT . "/app/Core/" . $class . ".php";
    if (file_exists($filename)) {
        require_once $filename;
    }
}

spl_autoload_register("autoload");

$Bootstrap = new Bootstrap();
$Bootstrap->init();

?>