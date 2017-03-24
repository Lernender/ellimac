<?php

include_once('../models/db-connection.php');


$partner = "SELECT * FROM partner";

$partnerData = [];

if ($resPar = $db->query($partner)) {

    while ($objPar = $resPar->fetch_object()) {
        $partnerData['partner'] = $objPar->par_name;
    }

    $resPar->close();
}


$server = "SELECT * FROM server";

$serverData = [];

if ($resSer = $db->query($server)) {

    while ($objSer = $resSer->fetch_object()) {
        $serverData['partner'] = $objSer->ser_name;
    }

    $resSer->close();
}




