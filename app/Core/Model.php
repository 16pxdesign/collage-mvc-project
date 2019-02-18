<?php

class Model
{
    protected $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getNavigationItems(){
        return $this->db->run("select * from website.menu");
    }


}

?>