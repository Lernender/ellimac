<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$user = 'root';
$password = 'root';
$dbname = 'project_db';
$host = 'localhost';
$port = 3306;


$db = new mysqli($host, $user, $password, $dbname);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


/**********************************************************************************************************************/

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