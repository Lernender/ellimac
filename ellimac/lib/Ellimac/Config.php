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

namespace Ellimac;

class Config
{
    public static function locateConfigFile($name)
    {
        $filename = ELLIMAC_CONFIGURATION_DIRECTORY . "/" . $name;

        if (file_exists($filename)) {
            return true;
        }

        return false;
    }

    // TODO: getSystemConfigs method

    public static function getSystemConfig()
    {
        $config = null;

        self::locateConfigFile('system.php');
        try {
            if (!defined('ELLIMAC_CONFIGURATION_FILE')) {
                define('ELLIMAC_CONFIGURATION_FILE', $filename);
            } if (file_exists($filename)) {

            } else {

            }
        }

    }

    public static function setSystemConfig()
    {

    }

}
