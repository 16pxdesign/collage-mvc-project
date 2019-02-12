<?php

class Session
{

    public function __construct()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    public function display()
    {
        return $_SESSION;
    }

    public function destroy()
    {
        session_unset();
        session_destroy();
        session_start();
    }

    public function isExist($key){
        if(isset($_SESSION[$key]) && !empty($_SESSION[$key])){
            return true;
        }

        return false;
    }

    public function get($key, $second_key = false)
    {

        if ($second_key == true) {

            if (isset($_SESSION[$key][$second_key])) {
                return $_SESSION[$key][$second_key];
            }

        } else {

            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }

        }
        return false;
    }
}