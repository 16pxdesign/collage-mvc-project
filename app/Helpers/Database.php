<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 12/11/2018
 * Time: 08:13
 */

class Database extends PDO
{
    private $_driver = 'mysql';
    private $_host = '192.168.1.1:3307';
    private $_user = 'admin';
    private $_password = 'donau1';
    private $_database = 'test';

    public function __construct()
    {
        try {
            parent::__construct($this->_driver . ':host=' . $this->_host . ';dbname=' . $this->_database, $this->_user, $this->_password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
        } catch (PDOException $exception) {
            //cannot connect procedure
        }

    }

}