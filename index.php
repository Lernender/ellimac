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

error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once("ellimac/config/startup.php");

try {
    \Ellimac::run();
} catch (Exception $e) {
    throw $e;
}