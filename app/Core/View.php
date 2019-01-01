<?php

class View
{
    //import view
    public function render($path, $data = false, $error = false)
    {
        require_once "app/View/$path.php";
    }


}