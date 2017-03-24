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

class Db
{
    protected $connection;

    /**
     * @return the DB
     */
    public function dbConnect()
    {
        if (!isset(self::$connection)) {
            include_once('../../webseite/var/config/system.php');
            self::$connection = new mysqli($config ['host'], $config ['user'], $config ['password'], $config ['dbbname']);
        }

        if (self::$connection === false) {
            return mysqli_errno();
        }
        return self::$connection;
    }

    /**
     * @param
     * @return
     */
    public function query($query)
    {
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        return $result;
    }

    /**
     * @param
     * @return a array with my query
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
     * @return
     */
    public function error()
    {
        $connection = $this->dbConnect();
        return $connection->error;
    }

    /**
     * @param
     * @return
     */
    public function quote($value)
    {
        $connection = $this->dbConnect();
        return "'" . $connection->real_escape_string($value) . "'";
    }

    public function delete($table, $id)
    {
        $query = 'DELETE FROM' . ' ' . $table . ' ' . 'WHERE id=' . $id;
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        return $result;
    }
}

//TODO: Connection String
