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

use Ellimac\Model\Database;


$db = new Database();
$connect = $db->dbConnect();

p_r($_POST);die;

if (isset($_POST["save"]))  {
    $newClient = "INSERT INTO client (cli_name, cli_address, cli_zipCode, cli_city) VALUES ('" . $_POST["client"] . "', '" . $_POST["cli_address"] . "', '" . $_POST["cli_zipCode"] . "', '" . $_POST["cli_city"] . "')";

    $newProject = "INSERT INTO project (pro_name, pro_url, cli_id, par_id, ser_id, sta_id) VALUES ('" . $_POST["project"] . "', '" . $_POST["pro_url"] . "', '" . $_POST["cli_id"] . "', '" . $_POST["par_id"] . "', '" . $_POST["ser_id"] . "', '" . $_POST["sta_id"] . "')";

    $run = $db->query($newClient);
    $run .= $db->query($newProject);
}