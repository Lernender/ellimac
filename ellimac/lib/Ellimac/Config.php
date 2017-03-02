<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Config
{
    public static function locateConfigFile($name)
    {
        $filename = ELLIMAC_CONFIGURATION_DIRECTORY . $name;

        if (file_exists($filename)) {
            echo "Die Datei $name existiert!";
        } else {
            echo "Die Datei $name existiert nicht!";
        }
    }

    // TODO: getSystemConfigs method
}

$config = new Config();
$config::locateConfigFile('system.php');

//TODO: Config Klasse schreiben