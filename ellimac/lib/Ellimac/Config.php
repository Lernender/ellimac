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
            return $filename;
        }

        return false;
    }

    public static function getSystemConfig()
    {
        $config = null;

        $file = self::locateConfigFile('system.php');
        try {
            if (file_exists($file)) {
                $config = new \Ellimac\Config\Config(include($file));
            } else {
                throw new \Exception($file . " existiert nicht.");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
            throw new \Exception($e);
        }

        return $config;

    }

 }
