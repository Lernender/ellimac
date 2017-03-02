<?php

include_once('../models/db-connection.php');


$project = "SELECT * FROM project";
$projectData = [];

if ($resPro = $db->query($project)) {

$i = 0;
while ($objPro = $resPro->fetch_object()) {
$projectData[$i]['name'] = $objPro->pro_name;
$projectData[$i]['url'] = $objPro->pro_url;
$i++;
}

$resPro->close();
}

$db->close();
