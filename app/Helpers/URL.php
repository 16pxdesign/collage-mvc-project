<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 07-Mar-19
 * Time: 10:00
 */

class URL
{

    public static $HISTORY;
    public static function routeHist(){

        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 1;

        $data = json_decode($_COOKIE['history'], true);
        //$data = null;

        if($data==null)
            $data = array();

        array_unshift($data, $url);
        if(count($data)>=5){
            array_pop($data);
        }
        URL::$HISTORY = $data;

        setcookie('history', json_encode($data), time()+3600);

    }
    public static function show(){

        var_dump(URL::$HISTORY);

    }

}