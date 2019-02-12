<?php
/**
 * Created by PhpStorm.
 * User: pingu
 * Date: 12/11/2018
 * Time: 08:13
 */
//90.254.138.121
class Database extends PDO
{
    private $_driver = 'mysql';
    private $_host = '192.168.1.12:3306';
    private $_user = 'user';
    private $_password = 'Ineed1$babe';
    private $_database = 'website';
    private $_char = 'utf8';
    private $_dsn = null;


    public function __construct()
    {
        $this->_dsn = $this->_driver.':host='.$this->_host.';dbname='.$this->_database.';charset='.$this->_char;
        $default_options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $options = array_replace($default_options, []);
        parent::__construct($this->_dsn, $this->_user, $this->_password, $options);
    }

    public function run($sql, $args = NULL)
    {
        if (!$args)
        {
            return $this->query($sql)->fetchAll();
        }
        $stmt = $this->prepare($sql);
        $stmt->execute($args);
        return $stmt->fetchAll();
    }



}