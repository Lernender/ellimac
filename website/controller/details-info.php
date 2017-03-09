<?php

include_once('../models/db-connection.php');

$client = "SELECT * FROM client ORDER BY cli_name";

foreach ($db->query($client) as $cli) {

    $cliId = $id
    echo $cli[$cliId]['cli_name'] . ", " . $cli[$cliId]['cli_address'] . ', ' . $cli[$cliId]['cli_zipCode'] . ' ' . $cli[$cliId]['cli_city'] . '<br><br>';
}
