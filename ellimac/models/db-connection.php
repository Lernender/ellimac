<?php
/**
 * Ellimac
 *
 * This is a project made by Camille Peter.
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) 2017 w-vision | Woche-Pass AG (https://www.w-vision.ch)
 */

use Ellimac\Config;

class Db
{
    /**
     * @var
     */
    protected $connection;

    public function dbConnect()
    {
        $config = Config::getSystemConfig();

        if (!isset($this->connection)) {
            $this->connection = new mysqli($config->database->get('host'), $config->database->get('user'), $config->database->get('password'), $config->database->get('dbname'));
        }

        if ($this->connection === false) {
            return mysqli_errno();
        }

        return $this->connection;
    }

    /**
     * @param $query
     * @return bool|mysqli_result
     */
    public function query($query)
    {
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        return $result;
    }

    /**
     * @param $query
     * @return array|bool
     */
    public function select($query)
    {
        $rows = array();
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * @return string
     */
    public function error()
    {
        $connection = $this->dbConnect();
        return $connection->error;
    }

    /**
     * @param $value
     * @return string
     */
    public function quote($value)
    {
        $connection = $this->dbConnect();
        return "'" . $connection->real_escape_string($value) . "'";
    }

    /**
     * @param $table
     * @param $id
     * @return bool|mysqli_result
     */
    public function delete($table, $id)
    {
        $query = 'DELETE FROM' . ' ' . $table . ' ' . 'WHERE id=' . $id;
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        return $result;
    }
}

//TODO: Connection String
