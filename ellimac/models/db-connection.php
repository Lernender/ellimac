<?php

include_once ('../../webseite/var/config/system.php');

class Db
{
    /**
     * @var
     */
    public $connection;

    /**
     * Db constructor.
     * @param $host
     * @param $user
     * @param $password
     * @param $dbname
     */
    public function __construct($host, $user, $password, $dbname)
    {
        $this->connection = new mysqli($host, $user, $password, $dbname);
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param $value
     */
    public function setConnection($value)
    {
        $this->connection = $value;
    }

    public static function isConnected()
    {

    }
}