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

namespace Ellimac\Model;

use Ellimac\Config;

class Database
{
    /**
     * @var
     */
    protected $connection;

    public function dbConnect()
    {
        $config = Config::getSystemConfig();

        if (!isset($this->connection)) {
            $this->connection = new \mysqli($config->database->host, $config->database->username, $config->database->password, $config->database->dbname);
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
        $rows = [];
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
        $query = sprintf('DELETE FROM %s WHERE pro_id = %s', $table, $id);
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update($project, $url, $cli, $cli_address, $cli_zipCode, $cli_city, $par_id, $ser_id, $id)
    {
        $connection = $this->dbConnect();

        $cli_id = "SELECT cli_id FROM project WHERE pro_id = " . $id;
        $result = $connection->query($cli_id);
        $query = $result->fetch_assoc();
        $cli_id = $query['cli_id'];

        $connection = $this->dbConnect();

        $query = "UPDATE project SET pro_name = '$project', pro_url = '$url' , par_id = $par_id, ser_id = $ser_id WHERE pro_id = $id";
        $result = $connection->query($query);

        $query = "UPDATE client SET cli_name = '$cli' , cli_address = '$cli_address', cli_zipCode = '$cli_zipCode',cli_city = '$cli_city' WHERE cli_id = " . $cli_id;
        $result = $connection->query($query);


        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function addProject($cli_name, $cli_address, $cli_zipCode, $cli_city, $pro_name, $pro_url, $par, $ser)
    {
        $connection = $this->dbConnect();

        $query = "INSERT INTO client (cli_name, cli_address, cli_zipCode, cli_city) VALUES ('$cli_name', '$cli_address', '$cli_zipCode', '$cli_city')";
        $result = $connection->query($query);

        $last_id = $connection->insert_id;

        $query = "INSERT INTO project (pro_name, pro_url, cli_id, par_id, ser_id, sta_id) VALUES ('$pro_name', '$pro_url', $last_id, $par, $ser, 4)";
        $result = $connection->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getNewProject()
    {
        $connection = $this->dbConnect();

        $id = $connection->insert_id;
        return $id;
    }

    public function getProject($id)
    {

        $rows = [];
        $query = 'SELECT * FROM project LEFT OUTER JOIN state ON project.sta_id = state.sta_id LEFT OUTER JOIN client  ON project.cli_id = client.cli_id LEFT OUTER JOIN partner ON project.par_id = partner.par_id LEFT OUTER JOIN server  ON project.ser_id = server.ser_id WHERE pro_id = ' . $id;

        $connection = $this->dbConnect();
        $result = $connection->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    public function getlist()
    {
        $query = "SELECT * FROM project LEFT OUTER JOIN state  ON project.sta_id = state.sta_id ORDER BY (CASE project.sta_id WHEN 4 THEN 1 WHEN 1 THEN 2 WHEN 3 THEN 3 WHEN 5 THEN 4 WHEN 2 THEN 5 ELSE 100 END) ASC, pro_name DESC";
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getPartners()
    {
        $query = "SELECT * FROM partner";
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getServer()
    {
        $query = "SELECT * FROM server";
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }
}

//TODO: Connection String
