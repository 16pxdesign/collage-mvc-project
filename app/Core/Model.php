<?php

class Model
{
    protected $db = null;
    protected $model = "test";

    public function __construct()
    {
        $this->db = new Database();
    }


}

?>