<?php

include_once('../models/db-connection.php');

$pro = "SELECT * FROM project";

while ($id >= 0) {

    if ($pro->pro_id = $id) {
        $proName = $client->pro_name;
        $proURL = $client->pro_url;
        //Kunde auswählen, welcher bei diesem Projekt hinterlegt ist.
        $cliId = $cli_id
        $cliName = $cli->cli_name;
        $cliAddress = $cli->cli_address;
        $cliZip= $cli->cli_zipCode;
        $cliCity = $cli->cli_city;
        //Partner auswählen, welcher bei diesem Projekt hinterlegt ist.
        $parName = $par->par_name;
        //Server auswählen, welcher bei diesem Projekt hinterlegt ist.
        $serName = $ser->ser_name;
    }

    $pro->pro_id++;
}
