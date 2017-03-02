<?php

include_once('../models/db-connection.php');


$client = "SELECT * FROM client ORDER BY cli_name";

foreach ($db->query($client) as $cli) {
    echo $cli['cli_name'] . ", " . $cli['cli_address'] . ', ' . $cli['cli_zipCode'] . ' ' . $cli['cli_city'] . '<br><br>';
}
