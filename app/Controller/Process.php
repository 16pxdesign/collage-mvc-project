<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 12-Feb-19
 * Time: 02:16
 */

class Process extends Controller
{
    protected $errorMSG = "";

    public function __construct($session)
    {
        parent::__construct($session);
        if (empty($_POST)) {
            $this->errorMSG .= "Empty";
            echo json_encode(['code' => 404, 'msg' => $this->errorMSG]);
            self::redirect();
        }
    }

}