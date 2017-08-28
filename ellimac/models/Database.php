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
        $query = sprintf('DELETE FROM %s WHERE id = %s', $table, $id);
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function update($project, $url, $cli, $par, $ser, $sta, $id)
    {
        $update = "UPDATE project SET pro_name = $project, pro_url = $url, cli_id = $cli, par_id = $par, ser_id = $ser, sta_id = $sta) WHERE pro_id = $id";
        return $update;
    }

    public function add($client, $address, $zipCode, $city, $project, $url, $cli_id, $par_id, $ser_id, $sta_id)
    {
        $query = "INSERT INTO client (cli_name, cli_address, cli_zipCode, cli_city) VALUES ($client, $address, $zipCode, $city)";
        $query .= "INSERT INTO project (pro_name, pro_url, cli_id, par_id, ser_id, sta_id) VALUES ($project, $url, $cli_id, $par_id, $ser_id, $sta_id)";
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function search($id)
    {
        $query = 'SELECT * FROM project LEFT OUTER JOIN state ON project.sta_id = state.sta_id LEFT OUTER JOIN client  ON project.cli_id = client.cli_id LEFT OUTER JOIN partner  ON project.par_id = partner.par_id LEFT OUTER JOIN server  ON project.ser_id = server.ser_id WHERE pro_id = ' . $id;
        $connection = $this->dbConnect();
        $result = $connection->query($query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getlist()
    {
        $query = 'SELECT * FROM project LEFT OUTER JOIN state  ON project.sta_id = state.sta_id';
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
