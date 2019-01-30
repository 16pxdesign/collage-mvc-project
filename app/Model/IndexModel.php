<?php

class IndexModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function topMenu()
    {
        return $this->db->run("select name,link from top_menu");
    }


}

?>

