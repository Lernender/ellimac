<?php

include_once('../models/db-connection.php');


$partner = "SELECT * FROM partner";

$partnerData = [];

if ($resPar = $db->query($partner)) {

    while ($objPar = $resPar->fetch_object()) {
        $partnerData[] = $objPar->par_name;
    }

    $resPar->close();
}