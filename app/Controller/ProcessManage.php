<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 24-Feb-19
 * Time: 03:51
 */

class ProcessManage extends Manage
{
    public $process = null;
    public function __construct($session)
    {
        parent::__construct($session);
        $this->process = new Process();
    }

    public function index()
    {

    }
}